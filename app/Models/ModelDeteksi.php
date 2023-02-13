<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDeteksi extends Model
{
    public function addData($data)
    {
        $input_riwayat['nama'] = $data['nama'];
        $input_riwayat['umur'] = $data['umur'];
        $input_riwayat['jenis_kelamin'] = $data['jenis_kelamin'];
        $input_riwayat['domisili'] = $data['domisili'];
        $input_riwayat['tanggal'] = $data['tanggal'];
        //$input_riwayat['kode_deteksi'] = $data['kode_deteksi'];

        $this->db->table('tbl_riwayat')->insert($input_riwayat);

        $input_data['id_riwayat'] = $this->db->insertID();
        foreach ($data['id_gejala'] as $input_data['id_gejala'] => $input_data['data_deteksi']) {
            $this->db->table('tbl_deteksi')->insert($input_data);
        }

        foreach ($data['id_gejala_string'] as $input_data['id_gejala'] => $input_data['all_sub_gejala']) {
            $this->db->table('tbl_deteksi_string')->insert($input_data);
        }

        return $input_data['id_riwayat'];
    }

    public function deteksiRiwayat($id_riwayat)
    {
        return $this->db->table('tbl_deteksi')
        ->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_deteksi.id_gejala', 'left')
        ->where('id_riwayat', $id_riwayat)
        ->get()
        ->getResultArray(); // Satu baris aja
    }

    public function getDataDiri($id_riwayat)
    {
        return $this->db->table('tbl_riwayat')
        ->where('id_riwayat', $id_riwayat)
        ->get()
        ->getRowArray(); // Satu baris aja
    }

    public function hitungHasil($id_riwayat)
    {
        $this->ModelHimpunan = new ModelHimpunan();
        $this->ModelAturan = new ModelAturan();
        $this->ModelSolusi = new ModelSolusi();
        $data['input'] = $this->deteksiRiwayat($id_riwayat);

        // Fuzzifikasi
        foreach ($data['input'] as $key_i => $value_i) {
            $input = $value_i['data_deteksi'];
            $idv = $value_i['id_gejala'];
            $data_himpunan = $this->ModelHimpunan->getHimpunan($idv);
        
            foreach ($data_himpunan as $key_h => $value_h) {
                $bb[$idv][$value_h['id_himpunan']] = $value_h['batas_bawah_himpunan'];
                $bt[$idv][$value_h['id_himpunan']] = $value_h['batas_tengah_himpunan'];
                $ba[$idv][$value_h['id_himpunan']] = $value_h['batas_atas_himpunan'];
            }

            foreach ($bb[$idv] as $idh => $nilai_batas_bawah) {
                if ($nilai_batas_bawah <= min($bb[$idv])) {
                    if($input >= $ba[$idv][$idh]){
                        $nilai_keanggotaan[$idv][$idh] = 0;
                    }elseif($input >= $bt[$idv][$idh] AND $input <= $ba[$idv][$idh]){
                        $nilai_keanggotaan[$idv][$idh] = ($ba[$idv][$idh] - $input)/($ba[$idv][$idh] - $bt[$idv][$idh]);
                    }elseif($input <= $bt[$idv][$idh]){
                        $nilai_keanggotaan[$idv][$idh] = 1;
                    }
                } elseif($nilai_batas_bawah >= max($bb[$idv])){
                    if($input <= $bb[$idv][$idh]){
                        $nilai_keanggotaan[$idv][$idh] = 0;
                    }elseif($input >= $bb[$idv][$idh] AND $input <= $bt[$idv][$idh]){
                        $nilai_keanggotaan[$idv][$idh] = ($input - $bb[$idv][$idh])/($bt[$idv][$idh] - $bb[$idv][$idh]);
                    }elseif($input >= $bt[$idv][$idh]){
                        $nilai_keanggotaan[$idv][$idh] = 1;
                    }
                }
            }
        }

        // Inferensi
        $data_aturan = $this->ModelAturan->getAllData();
        foreach ($data_aturan as $key_a => $value_a) {
            $idr = $value_a['id_aturan'];
            $data_detail = $this->ModelAturan->getDetailAturan($idr);
            foreach ($data_detail as $key_d => $value_d) {
                $idv = $value_d['id_gejala'];
                $idh = $value_d['id_himpunan'];
                $kelompok_aturan[$idr][$idh] = $nilai_keanggotaan[$idv][$idh];
            }
            $predikat[$idr] = min($kelompok_aturan[$idr]);

			// Cari nilai Y
			if ($value_a['id_keputusan']=="1") {
				$nilai_z[$idr] = 50 - ($predikat[$idr] * ($value_a['batas_atas_keputusan'] - $value_a['batas_tengah_keputusan']));
			} elseif ($value_a['id_keputusan']=="2"){
				$a = $value_a['batas_bawah_keputusan'] + ($predikat[$idr] * ($value_a['batas_tengah_keputusan'] - $value_a['batas_bawah_keputusan']));
				$b = $value_a['batas_atas_keputusan'] - ($predikat[$idr] * ($value_a['batas_atas_keputusan'] - $value_a['batas_tengah_keputusan']));
				$nilai_z[$idr] = min($a, $b);
			} elseif ($value_a['id_keputusan']=="3"){
				$nilai_z[$idr] = $value_a['batas_bawah_keputusan'] + ($predikat[$idr] * ($value_a['batas_tengah_keputusan'] - $value_a['batas_bawah_keputusan']));
			}

			$kali_dfz[$idr] = $predikat[$idr] * $nilai_z[$idr];
        }

        $hasil_dfz=array_sum($kali_dfz) / array_sum($predikat);
		$dfz = round(array_sum($kali_dfz) / array_sum($predikat), 2) . "%";

		$penyakit=$this->ModelSolusi->getAllDataPenyakit();
		foreach ($penyakit as $index => $value) {
			if ($hasil_dfz >= $value['batas_bawah_penyakit'] AND $hasil_dfz <= $value['batas_atas_penyakit']) {
				$hasil_penyakit = $value['nama_penyakit'];
				$id_penyakit = $value['id_penyakit'];
			}
		}

        $input_hasil['hasil'] = $hasil_dfz;
        $input_hasil['id_penyakit'] = $id_penyakit;
        $this->db->table('tbl_riwayat')->WHERE('id_riwayat', $id_riwayat)->update($input_hasil);

		foreach ($nilai_keanggotaan as $id_gejala => $value) {
			foreach ($value as $id_himpunan => $hasil) {
				$data_himpunan = $this->ModelHimpunan->getDetailHimpunan($id_himpunan);
				$data['nilai_keanggotaan'][$data_himpunan['nama_gejala']][$data_himpunan['nama_himpunan']] = $hasil;
            }
		}

        foreach ($predikat as $id_aturan => $value) {
			$data_aturan = $this->ModelAturan->getAturan($id_aturan);
			$data['predikat'][$data_aturan['nama_aturan']] = $predikat[$id_aturan];
			$data['nilai_z'][$data_aturan['nama_aturan']] = $nilai_z[$id_aturan];
		}

        $data['defuzzifikasi'] = $dfz;
        $data['nilai_keanggotaan'] = $nilai_keanggotaan;
		$data['penyakit'] = $hasil_penyakit;
		$data['id_penyakit'] = $id_penyakit;

		return $data;
    }

    public function getHasil($id_riwayat)
    {
        return $this->db->table('tbl_deteksi_string')
            ->where('id_riwayat', $id_riwayat)
            ->get()
            ->getResultArray(); // Satu baris aja

    }
}
