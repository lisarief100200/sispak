<?= $this->extend('template/template_admin') ?>

<?= $this->section('content') ?>
        
<h4 style="margin-top:2%; margin-bottom:2%;"><?= $subtitle ?></h1> 

<div class="col-sm-4">
    <button class="btn btn-primary" type="Button" data-bs-toggle="modal" data-bs-target="#tambah">+ Tambah Solusi</button>
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
                <th scope="col" class="align-middle text-center">Nama Solusi</th>
                <th scope="col" class="align-middle text-center">Solusi</th>
                <th scope="col" colspan="2" class="align-middle text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($solusi as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_penyakit']; ?></td>
                    <td><?= $value['deskripsi_solusi']; ?></td>
                    <td><button class="btn btn-warning" href="#" role="button" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_solusi'] ?>"><i class="bi bi-pencil-square"></i> Edit</button></td>
                    <td><button class="btn btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#delete<?= $value['id_solusi'] ?>"><i class="bi bi-trash"></i> Delete</button></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Add Solusi -->
<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Solusi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <?php echo form_open('solusi/addData'); ?>
            
        <div class="modal-body">
            <div class="mb-3">
                <label for="inputNamaPenyakit" class="form-label">Pilih Solusi</label>
                <select class="form-select" aria-label="Default select example" id="inputNamaPenyakit" name="id_penyakit" required>
                    <option value="">-- Pilih Solusi --</option>
                    <?php
                        foreach ($solusi_untuk_penyakit as $key => $value) { ?>
                            <option value="<?= $value['id_penyakit'] ?>"><?= $value['nama_penyakit']; ?></option>
                        <?php 
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="inputDeskripsiSolusi">Solusi</label>
                <textarea class="form-control" id="inputDeskripsiSolusi" rows="3" name="deskripsi_solusi"></textarea>
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
foreach ($solusi as $key => $value) { ?>

<!-- Edit Solusi -->
<div class="modal fade" id="edit<?= $value['id_solusi'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Solusi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <?php echo form_open('solusi/editData/' . $value['id_solusi']); ?>
            
        <div class="modal-body">
            <div class="mb-3">
                <label for="inputNamaPenyakit" class="form-label">Pilih Solusi</label>
                <select class="form-select" aria-label="Default select example" id="inputNamaPenyakit" name="id_penyakit" required>
                    <option value="<?= $value['id_penyakit'] ?>">-- <?= $value['nama_penyakit']; ?> --</option>
                    <?php
                        foreach ($solusi_untuk_penyakit as $key => $value2) { ?>
                            <option value="<?= $value2['id_penyakit'] ?>"><?= $value2['nama_penyakit']; ?></option>
                        <?php 
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="inputDeskripsiSolusi">Solusi</label>
                <textarea class="form-control" id="inputDeskripsiSolusi" rows="3" name="deskripsi_solusi"><?= $value['deskripsi_solusi'] ?></textarea>
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
foreach ($solusi as $key => $value) { ?>

<div class="modal fade" id="delete<?= $value['id_solusi'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Solusi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
            Apakah Anda ingin menghapus solusi <b><?= $value['deskripsi_solusi'] ?></b>  <b>(<?= $value['nama_penyakit'] ?>)</b>?
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="<?= base_url('solusi/deleteData/' . $value['id_solusi']) ?>" class="btn btn-danger">Hapus</a>
        </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php
}
?>


<?= $this->endSection() ?>