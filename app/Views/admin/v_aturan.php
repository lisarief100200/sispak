<?= $this->extend('template/template_admin') ?>

<?= $this->section('content') ?>
        
<h4 style="margin-top:2%; margin-bottom:2%;"><?= $subtitle ?></h1> 

<div class="col-sm-4">
    <button class="btn btn-primary" type="Button" data-bs-toggle="modal" data-bs-target="#tambah">+ Tambah Aturan</button>
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
                <th scope="col" class="align-middle text-center">Nama Aturan</th>
                <th scope="col" class="align-middle text-center">Aturan</th>
                <th scope="col" colspan="2" class="align-middle text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($aturan as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_aturan']; ?></td>
                    <td><b>IF</b> <?= $value['detail']; ?> <b>THEN</b> <?= $value['nama_keputusan'] ?></td>
                    <td><a class="btn btn-warning" href="<?= base_url('aturan/editData/' . $value['id_aturan']) ?>"><i class="bi bi-pencil-square"></i> Edit</a></td>
                    <td><button class="btn btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_aturan'] ?>"><i class="bi bi-trash"></i> Delete</button></td>
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
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Aturan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php echo form_open('aturan/addData'); ?>
            
        <div class="modal-body">
            <div class="mb-3">
                <label for="inputNamaAturan" class="form-label">Nama Aturan</label>
                <input type="text" class="form-control" id="inputNamaAturan" name="nama_aturan" placeholder="Masukkan nama aturan" required>
            </div>

            <?php
            foreach ($himpunan as $key => $value) { ?>
            <div class="mb-3">
                <label for="inputNamaHimpunan" class="form-label">Pilih Himpunan Pada <b><?= $value['nama_gejala1'] ?></b></label>
                <select class="form-select" aria-label="Default select example" id="inputNamaHimpunan" name="id_himpunan[<?= $key ?>]" required>
                    <option value="">-- Pilih Himpunan --</option>
                    <?php
                    foreach ($value['nama_himpunan1'] as $key => $value1) { ?>
                    <option value="<?= $value1['id_himpunan'] ?>"><?= $value1['nama_himpunan'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <?php
            }
            ?>

            <div class="mb-3">
                <label for="inputKeputusan" class="form-label">Pilih Keputusan</label>
                <select class="form-select" aria-label="Default select example" id="inputKeputusan" name="id_keputusan" required>
                    <option value="">-- Pilih Keputusan --</option>
                    <?php
                    foreach ($keputusan as $key => $value) { ?>
                    <option value="<?= $value['id_keputusan'] ?>"; ><?= $value['nama_keputusan'] ?></option>
                    <?php
                    }
                    ?>
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

<!-- Edit Aturan -->
<?php 
foreach ($aturan as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_aturan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Aturan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php echo form_open('aturan'); ?>

        <div class="modal-body">
            <div class="mb-3">
              <p>
                <b>IF</b> <?= $value['detail']; ?> <b>THEN</b> <?= $value['nama_keputusan'] ?>
              </p>
            </div>

            <div class="mb-3">
                <label for="inputNamaAturan" class="form-label">Nama Gejala</label>
                <input type="text" class="form-control" id="inputNamaAturan" name="nama_aturan" value="<?= $value['nama_aturan']; ?>" placeholder="Masukkan nama aturan" required>
            </div>

            <?php
            foreach ($himpunan as $key => $value2) { ?>
            <div class="mb-3">
                <label for="inputNamaHimpunan" class="form-label">Pilih Himpunan Pada <b><?= $value2['nama_gejala1'] ?></b></label>
                <select class="form-select" aria-label="Default select example" id="inputNamaHimpunan" name="id_himpunan[<?= $key ?>]" required>
                    <option value="">-- Pilih Himpunan --</option>
                    <?php
                    foreach ($value2['nama_himpunan1'] as $index => $value1) { ?>
                    <option value="<?= $value1['id_himpunan'] ?>" 
                    <?php
                      if (isset($detail1[$value1['id_gejala']]) AND $detail1[$value1['id_gejala']] == $value1['id_himpunan']) {
                        echo "selected";
                      }
                    ?>
                    ><?= $value1['nama_himpunan'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <?php
            }
            ?>

            <div class="mb-3">
                <label for="inputKeputusan" class="form-label">Pilih Keputusan</label>
                <select class="form-select" aria-label="Default select example" id="inputKeputusan" name="id_keputusan" required>
                    <option value="">-- Pilih Keputusan --</option>
                    <?php
                    foreach ($keputusan as $key => $value) { ?>
                    <option value="<?= $value['id_keputusan'] ?>"; ><?= $value['nama_keputusan'] ?></option>
                    <?php
                    }
                    ?>
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
foreach ($aturan as $key => $value) { ?>

<div class="modal fade" id="delete<?= $value['id_aturan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Aturan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
            Apakah Anda ingin menghapus aturan <b><?= $value['nama_aturan'] ?></b>?

            <p>
                <b>IF</b> <?= $value['detail']; ?> <b>THEN</b> <?= $value['nama_keputusan'] ?>
            </p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="<?= base_url('aturan/deleteData/' . $value['id_aturan']) ?>" class="btn btn-danger">Hapus</a>
        </div>

    </div>
  </div>
</div>

<?php
}
?>


<?= $this->endSection() ?>