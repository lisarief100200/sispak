<?= $this->extend('template/template_admin') ?>

<?= $this->section('content') ?>
        
<h4 style="margin-top:2%; margin-bottom:2%;"><?= $subtitle ?></h1> 

<div class="col-sm-12">
    <p></p>
    <?php
    if (session()->getFlashdata('tambah')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('tambah');
        echo '</div>';
    }

    if (session()->getFlashdata('edit')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getFlashdata('edit');
        echo '</div>';
    }

    if (session()->getFlashdata('delete')) {
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('delete');
        echo '</div>';
    }
    ?>
</div>

<div class="col-sm-12">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="align-middle text-center">No</th>
                <th scope="col" class="align-middle text-center">Nama</th>
                <th scope="col" class="align-middle text-center">Umur</th>
                <th scope="col" class="align-middle text-center">Jenis Kelamin</th>
                <th scope="col" class="align-middle text-center">Domisili</th>
                <th scope="col" class="align-middle text-center">Hasil</th>
                <th scope="col" class="align-middle text-center">Defuzzifikaasi</th>
                <th scope="col" class="align-middle text-center">Tanggal</th>
                <th scope="col" class="align-middle text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pengguna as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama']; ?></td>
                    <td><?= $value['umur']; ?></td>
                    <td>
                        <?php if ($value['jenis_kelamin'] == "p") {
                            echo "Perempuan";
                        } else {
                            echo "Laki-laki";
                            }?></td>
                    <td><?= $value['domisili']; ?></td>
                    <td><?= $value['deskripsi_solusi']; ?></td>
                    <td><?= $value['hasil']; ?></td>
                    <td><?= $value['tanggal']; ?></td>
                    <td><button class="btn btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_riwayat'] ?>"><i class="bi bi-trash"></i> Delete</button></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Delete Gejala -->
<?php 
foreach ($pengguna as $key => $value) { ?>

<div class="modal fade" id="delete<?= $value['id_riwayat'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Riwayat Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
            Apakah Anda ingin menghapus riwayat pengguna atas nama <b><?= $value['nama'] ?></b> pada <b>(<?= $value['tanggal'] ?>)</b>?
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="<?= base_url('pengguna/deleteData/' . $value['id_riwayat']) ?>" class="btn btn-danger">Hapus</a>
        </div>
    </div>
  </div>
</div>

<?php
}
?>


<?= $this->endSection() ?>