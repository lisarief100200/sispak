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
                <th scope="col" class="align-middle text-center">Nama Sub-Gejala</th>
                <th scope="col" class="align-middle text-center">Keterangan Sub-Gejala</th>
                <th scope="col" colspan="2" class="align-middle text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($sub_gejala as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_gejala']; ?></td>
                    <td><?= $value['nama_sub_gejala']; ?></td>
                    <td><?= $value['ket_sub_gejala']; ?></td>
                    <td><button class="btn btn-warning" href="#" role="button" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_sub_gejala'] ?>"><i class="bi bi-pencil-square"></i> Edit</button></td>
                    <td><button class="btn btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_sub_gejala'] ?>"><i class="bi bi-trash"></i> Delete</button></td>

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

      <?php echo form_open('subgejala/addData'); ?>
            
        <div class="modal-body">
            <div class="mb-3">
                <label for="inputNamaGejala" class="form-label">Nama Gejala</label>
                <select class="form-select" aria-label="Default select example" id="inputNamaGejala" name="id_gejala" required>
                    <option value="">-- Pilih Gejala --</option>
                    <?php
                        foreach ($gejala as $key => $value) { ?>
                            <option value="<?= $value['id_gejala'] ?>"><?= $value['nama_gejala']; ?></option>
                        <?php 
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="inputNamasubgejala" class="form-label">Nama Sub-Gejala</label>
                <input type="text" class="form-control" id="inputNamasubgejala" name="nama_sub_gejala" placeholder="Masukkan nama sub gejala" required>
            </div>

            <div class="mb-3">
                <label for="inputKetsubgejala">Keterangan</label>
                <textarea class="form-control" id="inputKetsubgejala" rows="3" name="ket_sub_gejala"></textarea>
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

<!-- Edit Sub-gejala -->
<?php 
foreach ($sub_gejala as $key => $value) { ?>

<div class="modal fade" id="edit<?= $value['id_sub_gejala'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Gejala</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php echo form_open('subgejala/editData/' . $value['id_sub_gejala']); ?>
            
        <div class="modal-body">
            <div class="mb-3">
                <label for="inputNamaGejala" class="form-label">Nama Gejala</label>
                <select class="form-select" aria-label="Default select example" id="inputNamaGejala" name="id_gejala" required>
                    <option value="<?= $value['id_gejala']; ?>">-- <?= $value['nama_gejala']; ?> --</option>
                    <?php
                        foreach ($gejala as $key => $value1) { ?>
                            <option value="<?= $value1['id_gejala'] ?>"><?= $value1['nama_gejala']; ?></option>
                        <?php 
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="inputNamasubgejala" class="form-label">Nama Gejala</label>
                <input type="text" class="form-control" id="inputNamasubgejala" name="nama_sub_gejala" value="<?= $value['nama_sub_gejala'] ?>" placeholder="Masukkan nama sub gejala" required>
            </div>

            <div class="mb-3">
                <label for="inputKetsubgejala">Keterangan</label>
                <textarea class="form-control" id="inputKetsubgejala" rows="3" name="ket_sub_gejala"><?= $value['ket_sub_gejala'] ?></textarea>
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

<!-- Delete Sub-Gejala -->
<?php 
foreach ($sub_gejala as $key => $value) { ?>

<div class="modal fade" id="delete<?= $value['id_sub_gejala'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Gejala</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
            Apakah Anda ingin menghapus sub-gejala <b><?= $value['nama_sub_gejala'] ?></b> untuk gejala <u><?= $value['nama_gejala'] ?></u>?
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="<?= base_url('subgejala/deleteData/' . $value['id_sub_gejala']) ?>" class="btn btn-danger">Hapus</a>
        </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php
}
?>

<?= $this->endSection() ?>