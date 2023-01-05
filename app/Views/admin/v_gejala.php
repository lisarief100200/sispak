<?= $this->extend('template/template_admin') ?>

<?= $this->section('content') ?>
        
<h4 style="margin-top:2%; margin-bottom:2%;"><?= $subtitle ?></h1> 

<div class="col-sm-4">
    <button class="btn btn-primary" type="Button" data-bs-toggle="modal" data-bs-target="#tambah">+ Tambah Gejala</button>
</div>

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
                <th scope="col" class="align-middle text-center">Nama Gejala</th>
                <th scope="col" class="align-middle text-center">Pertanyaan Gejala</th>
                <th scope="col" class="align-middle text-center">Tipe</th>
                <th scope="col" colspan="2" class="align-middle text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($gejala as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_gejala']; ?></td>
                    <td><?= $value['pertanyaan_gejala']; ?></td>
                    <td><span class="badge rounded-pill bg-primary"><?php echo ucfirst($value['type_gejala']) ?></span></td>
                    <td><button class="btn btn-warning" href="#" role="button" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_gejala'] ?>"><i class="bi bi-pencil-square"></i> Edit</button></td>
                    <td><button class="btn btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_gejala'] ?>"><i class="bi bi-trash"></i> Delete</button></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Add Gejala -->
<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Gejala</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php echo form_open('gejala/addData'); ?>
            
        <div class="modal-body">
            <div class="mb-3">
                <label for="inputNamaGejala" class="form-label">Nama Gejala</label>
                <input type="text" class="form-control" id="inputNamaGejala" name="nama_gejala" placeholder="Masukkan nama gejala" required>
            </div>

            <div class="mb-3">
                <label for="inputPertanyaanGejala" class="form-label">Pertanyaan Gejala</label>
                <input type="text" class="form-control" id="inputPertanyaanGejala" name="pertanyaan_gejala" placeholder="Masukkan pertanyaan yang akan ditampilkan pada sistem" required>
            </div>

            <div class="mb-3">
                <label for="inputTypeGejala" class="form-label">Pilih Tipe Gejala</label>
                <select class="form-select" aria-label="Default select example" id="inputTypeGejala" name="type_gejala" required>
                    <option value="">-- Pilih Tipe Gejala --</option>
                    <option value="fuzzy">Fuzzy</option>
                    <option value="crisp">Crisp</option>
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<!-- Edit Gejala -->
<?php 
foreach ($gejala as $key => $value) { ?>

<div class="modal fade" id="edit<?= $value['id_gejala'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Gejala</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php echo form_open('gejala/editData/' . $value['id_gejala']); ?>
            
        <div class="modal-body">
            <div class="mb-3">
                <label for="inputNamaGejala" class="form-label">Nama Gejala</label>
                <input type="text" value="<?= $value['nama_gejala'] ?>" class="form-control" id="inputNamaGejala" name="nama_gejala" placeholder="Masukkan nama gejala" required>
            </div>

            <div class="mb-3">
                <label for="inputPertanyaanGejala" class="form-label">Pertanyaan Gejala</label>
                <input type="text" value="<?= $value['pertanyaan_gejala'] ?>" class="form-control" id="inputPertanyaanGejala" name="pertanyaan_gejala" placeholder="Masukkan pertanyaan yang akan ditampilkan pada sistem" required>
            </div>

            <div class="mb-3">
                <label for="inputTypeGejala" class="form-label">Pilih Tipe Gejala</label>
                <select class="form-select" aria-label="Default select example" id="inputTypeGejala" name="type_gejala" required>
                    <option value="<?= $value['type_gejala'] ?>">-- <?= ucfirst($value['type_gejala']) ?> --</option>
                    <option value="fuzzy">Fuzzy</option>
                    <option value="crisp">Crisp</option>
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php
}
?>

<!-- Delete Gejala -->
<?php 
foreach ($gejala as $key => $value) { ?>

<div class="modal fade" id="delete<?= $value['id_gejala'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Gejala</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
            Apakah Anda ingin menghapus gejala <b><?= $value['nama_gejala'] ?></b>?
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="<?= base_url('gejala/deleteData/' . $value['id_gejala']) ?>" class="btn btn-danger">Hapus</a>
        </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php
}
?>

<?= $this->endSection() ?>