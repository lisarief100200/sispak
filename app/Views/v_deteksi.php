<?= $this->extend('template/template_user') ?>

<?= $this->section('content') ?>

<h2 class="text-center" style="margin-top:2%; margin-bottom:2%;">Sistem Pakar Diagnosa Awal Penyakit Hepatitis B</h2> 

<?php echo form_open('deteksi/addData'); ?>

    <?php
    if (session()->getFlashdata('msgcaptcha')) {
        echo "<div class='alert alert-danger' role='danger'><b>";
        echo session()->getFlashdata('msgcaptcha');
        echo "</b></div>";
    }
    ?>

    <div class="mb-3">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Nama" name="nama" required>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group row">
            <label for="inputAge" class="col-sm-2 col-form-label">Umur</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAge" placeholder="Umur" name="umur" required>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group row">
            <label for="inputSex" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="inputSex" name="jenis_kelamin" required>
                    <option selected value="">-- Pilih Jenis Kelamin --</option>
                    <option value="l">Laki-laki</option>
                    <option value="p">Perempuan</option>
                </select>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Domisili</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAddress" placeholder="Domisili" name="domisili" required>
            </div>
        </div>
    </div>

    <hr>

    <?php
    $min  = 0;
    $max  = 9;
    $num1 = rand($min, $max);
    $num2 = rand($min, $max);
    $sum  = $num1 + $num2;
    ?>

    <?php
    foreach ($gejala as $key => $value) { ?>
        <!--
        <input class="form-control" type="number" name="idd_gejala[<?php //echo $value['id_gejala'] ?>]">   
        -->
        <div class="mb-3">
            <div class="form-group">
                <label for="inputGejala" class="form-label"><b><?= $value['pertanyaan_gejala'] ?></b></label>
                <?php
                    // NANTI TULISANNYA == Gejala perut
                    if ($value['id_gejala'] == 0) { 
                        foreach ($subgejalaPerut as $key => $values) { ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inputSubgejala[<?= $values['id_sub_gejala'] ?>]" name="sub_gejalaPerut[]" value="<?= $values['nama_sub_gejala'] ?>">
                                <label class="form-check-label" for="inputSubgejala[<?= $values['id_sub_gejala'] ?>]">
                                <?= $values['ket_sub_gejala'] ?>
                                </label>
                            </div>
                        <?php
                        } ?>
                    <?php
                    } if ($value['id_gejala'] == 1) {
                        foreach ($subgejalaFlu as $key => $values) { ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inputSubgejala[<?= $values['id_sub_gejala'] ?>]" name="sub_gejalaFlu[]" value="<?= $values['nama_sub_gejala'] ?>">
                                <label class="form-check-label" for="inputSubgejala[<?= $values['id_sub_gejala'] ?>]">
                                <?= $values['ket_sub_gejala'] ?>
                                </label>
                            </div>
                        <?php
                        } ?>
                    <?php
                    } if ($value['id_gejala'] == 2) { ?>
                        <br>
                        <?php
                        foreach ($himpunan[$value['id_gejala']] as $key => $value2) { ?>
                            <input type="radio" value="
                            <?php
                                if ($value2['nama_himpunan'] == "Ya") {
                                    echo "1";
                                } else {
                                    echo "0";
                                }
                            ?>" id="inputGejala" name="sub_gejalaMata[]" required> <?= $value2['nama_himpunan'] ?>
                        <?php
                        }
                        ?>
                    <?php
                    } if ($value['id_gejala'] == 3) { ?>
                    <br>
                        <?php
                        foreach ($himpunan[$value['id_gejala']] as $key => $value2) { ?>
                            <input type="radio" value="
                            <?php
                                if ($value2['nama_himpunan'] == "Ya") {
                                    echo "1";
                                } else {
                                    echo "0";
                                }
                            ?>" id="inputGejala" name="sub_gejalaKulit[]" required> <?= $value2['nama_himpunan'] ?>
                        <?php
                        }
                        ?>
                    <?php 
                    } if ($value['id_gejala'] == 4) { ?>
                        <br>
                            <?php
                            foreach ($himpunan[$value['id_gejala']] as $key => $value2) { ?>
                                <input type="radio" value="
                                <?php
                                    if ($value2['nama_himpunan'] == "Ya") {
                                        echo "1";
                                    } else {
                                        echo "0";
                                    }
                                ?>" id="inputGejala" name="sub_gejalaSendi[]" required> <?= $value2['nama_himpunan'] ?>
                            <?php
                            }
                            ?>
                    <?php 
                    }
                    ?>
            </div>
            <!--
            <input class="form-control" type="number" name="id_gejala[<?php //echo $value['id_gejala'] ?>]">   
                -->
        </div>  
    <?php
    }
    ?>

    <label for="inputCaptcha" class="col-sm-12" style="color:red"><?= "<b>Pertanyaan keamanan: </b>" . $num1 . '+' . $num2; ?>?</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="inputCaptcha" placeholder="Jawaban" name="cpt" required>
    </div>

    <input type="hidden" name="rescpt" id="rescpt" value="<?= $sum ?>" />

    <?php
    $kode_deteksi = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 10, 12);
    ?>

    <input type="hidden" name="kode_deteksi" id="kode_deteksi" value="<?= $kode_deteksi ?>">

    <br>

    <button type="submit" class="btn btn-primary float-end btn-lg mb-3">Cek Sekarang</button>

<?php echo form_close(); ?>

<?= $this->endSection() ?>

