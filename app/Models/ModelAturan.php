<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAturan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_aturan')
            ->join('tbl_keputusan', 'tbl_keputusan.id_keputusan = tbl_aturan.id_keputusan', 'left')
            ->orderBy('tbl_aturan.id_aturan', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getDetailAturan($id_aturan)
    {
        return $this->db->table('tbl_detail_aturan')
            ->join('tbl_himpunan', 'tbl_himpunan.id_himpunan = tbl_detail_aturan.id_himpunan', 'left')
            ->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_himpunan.id_gejala', 'left')
            ->where('tbl_detail_aturan.id_aturan', $id_aturan)
            ->get()
            ->getResultArray(); // Satu baris aja
    }

    public function getAturan($id_aturan)
    {
        return $this->db->table('tbl_aturan')
        ->join('tbl_keputusan', 'tbl_keputusan.id_keputusan = tbl_aturan.id_keputusan', 'left')
        ->where('id_aturan', $id_aturan)
        ->get()
        ->getRowArray();
    }
    
    public function addData($data)
    {
        $data_aturan['nama_aturan'] = $data['nama_aturan'];
        $data_aturan['id_keputusan'] = $data['id_keputusan'];
        $this->db->table('tbl_aturan')->insert($data_aturan);

        // Ambil id yang baru dimasukkan
        $id_aturan = $this->db->insertID();
        foreach ($data['id_himpunan'] as $key => $value) {
            if (!empty($value)) {
                $detail['id_aturan'] = $id_aturan;
                $detail['id_himpunan'] = $value;
                $this->db->table('tbl_detail_aturan')->insert($detail);
            }
        }
    }

    public function editData($data, $id_aturan)
    {
        $edit_aturan['nama_aturan'] = $data['nama_aturan'];
        $edit_aturan['id_keputusan'] = $data['id_keputusan'];
        $this->db->table('tbl_aturan')->WHERE('id_aturan', $id_aturan)->update($edit_aturan);
    
        // Ubah aturan di detail data juga
        $data_lama = $this->getDetailAturan($id_aturan);
        foreach ($data_lama as $key => $value) {
            $himpunan_lama[] = $value['id_himpunan'];
        }

        // Ambil himpunan baru
        foreach ($data['id_himpunan'] as $key => $value) {
            if (!empty($value)) {
                $himpunan_baru[] = $value;
            }
        }

        $hapus_array = array_diff($himpunan_lama, $himpunan_baru);
        $tambah_array = array_diff($himpunan_baru, $himpunan_lama);

        foreach ($hapus_array as $key => $value) {
            $this->db->table('tbl_detail_aturan')->WHERE('id_aturan', $id_aturan)
                ->WHERE('id_himpunan', $value)->delete();
        }

        foreach ($tambah_array as $key => $value) {
            $data_detail['id_aturan'] = $id_aturan;
            $data_detail['id_himpunan'] = $value;
            $this->db->table('tbl_detail_aturan')->insert($data_detail);
        }
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_aturan')
            ->WHERE('id_aturan', $data['id_aturan'])
            ->delete($data);

        $this->db->table('tbl_detail_aturan')
            ->WHERE('id_aturan', $data['id_aturan'])
            ->delete($data);
    }
}
