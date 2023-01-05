<?= $this->extend('template/template_admin') ?>

<?= $this->section('content') ?>
        
<h4 style="margin-top:2%; margin-bottom:2%;"><?= $subtitle ?></h1> 

<?php echo form_open('aturan/simpanEditData/' . $aturan['id_aturan']); ?>

<div class="modal-body">
    <div class="mb-3">
        <label for="inputNamaAturan" class="form-label">Nama Gejala</label>
        <input type="text" class="form-control" id="inputNamaAturan" name="nama_aturan" value="<?= $aturan['nama_aturan']; ?>" placeholder="Masukkan nama aturan" required>
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
            <option value="<?= $value['id_keputusan'] ?>"; 
            <?php
                if ($aturan['id_keputusan'] == $value['id_keputusan']) {
                    echo "selected";
                }
            ?>
            ><?= $value['nama_keputusan'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>

<?php echo form_close(); ?>

<?= $this->endSection() ?>