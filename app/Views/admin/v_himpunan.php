<?= $this->extend('template/template_admin') ?>

<?= $this->section('content') ?>
        
<h4 style="margin-top:2%; margin-bottom:2%;"><?= $subtitle ?></h1> 

<div class="col-sm-4">
    <button class="btn btn-primary" type="Button" data-bs-toggle="modal" data-bs-target="#tambah">+ Tambah Himpunan</button>
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
                <th scope="col" class="align-middle text-center">Himpunan</th>
                <th scope="col" class="align-middle text-center">Batas Bawah</th>
                <th scope="col" class="align-middle text-center">Batas Tengah</th>
                <th scope="col" class="align-middle text-center">Batas Atas</th>
                <th scope="col" colspan="2" class="align-middle text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($himpunan as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_gejala']; ?></td>
                    <td><?= $value['nama_himpunan']; ?></td>
                    <td><?= $value['batas_bawah_himpunan']; ?></td>
                    <td><?= $value['batas_tengah_himpunan']; ?></td>
                    <td><?= $value['batas_atas_himpunan']; ?></td>
                    <td><button class="btn btn-warning" href="#" role="button" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_himpunan'] ?>"><i class="bi bi-pencil-square"></i> Edit</button></td>
                    <td><button class="btn btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_himpunan'] ?>"><i class="bi bi-trash"></i> Delete</button></td>

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
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Himpunan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php echo form_open('himpunan/addData'); ?>
            
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
                <label for="inputNamaHimpunan" class="form-label">Nama Himpunan</label>
                <input type="text" class="form-control" id="inputNamaHimpunan" name="nama_himpunan" placeholder="Masukkan nama himpunan" required>
            </div>

            <div class="mb-3">
                <label for="inputBatasBawahHimpunan" class="form-label">Batas Bawah Himpunan</label>
                <input type="number" min="0" step="0.01" class="form-control" id="inputBatasBawahHimpunan" name="batas_bawah_himpunan" placeholder="Masukkan batas bawah himpunan" required>
            </div>

            <div class="mb-3">
                <label for="inputBatasTengahHimpunan" class="form-label">Batas Tengah Himpunan</label>
                <input type="number" min="0" step="0.01" class="form-control" id="inputBatasTengahHimpunan" name="batas_tengah_himpunan" placeholder="Masukkan batas tengah himpunan" required>
            </div>

            <div class="mb-3">
                <label for="inputBatasAtasHimpunan" class="form-label">Batas Atas Himpunan</label>
                <input type="number" min="0" step="0.01" class="form-control" id="inputBatasAtasHimpunan" name="batas_atas_himpunan" placeholder="Masukkan batas atas himpunan" required>
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

<!-- Edit Himpunan -->
<?php 
foreach ($himpunan as $key => $value) { ?>

<div class="modal fade" id="edit<?= $value['id_himpunan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Himpunan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php echo form_open('himpunan/editData/' . $value['id_himpunan']); ?>
            
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
                <label for="inputNamaHimpunan" class="form-label">Nama Himpunan</label>
                <input type="text" class="form-control" id="inputNamaHimpunan" name="nama_himpunan" value="<?= $value['nama_himpunan'] ?>" placeholder="Masukkan nama himpunan" required>
            </div>

            <div class="mb-3">
                <label for="inputBatasBawahHimpunan" class="form-label">Batas Bawah Himpunan</label>
                <input type="number" min="0" step="0.01" class="form-control" id="inputBatasBawahHimpunan" name="batas_bawah_himpunan" value="<?= $value['batas_bawah_himpunan'] ?>" placeholder="Masukkan nilai batas bawah himpunan" required>
            </div>

            <div class="mb-3">
                <label for="inputBatasTengahHimpunan" class="form-label">Batas Tengah Himpunan</label>
                <input type="number" min="0" step="0.01" class="form-control" id="inputBatasTengahHimpunan" name="batas_tengah_himpunan" value="<?= $value['batas_tengah_himpunan'] ?>" placeholder="Masukkan nilai batas tengah himpunan" required>
            </div>

            <div class="mb-3">
                <label for="inputBatasAtasHimpunan" class="form-label">Batas Atas Himpunan</label>
                <input type="number" min="0" step="0.01" class="form-control" id="inputBatasAtasHimpunan" name="batas_atas_himpunan" value="<?= $value['batas_atas_himpunan'] ?>" placeholder="Masukkan nilai batas atas himpunan" required>
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

<!-- Delete Himpunan -->
<?php 
foreach ($himpunan as $key => $value) { ?>

<div class="modal fade" id="delete<?= $value['id_himpunan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Himpunan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
            Apakah Anda ingin menghapus himpunan <b><?= $value['nama_himpunan'] ?></b> untuk gejala <u><?= $value['nama_gejala'] ?></u>?
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="<?= base_url('himpunan/deleteData/' . $value['id_himpunan']) ?>" class="btn btn-danger">Hapus</a>
        </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php
}
?>

<?= $this->endSection() ?>