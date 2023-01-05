<?= $this->extend('template/template_user') ?>

<?= $this->section('content') ?>

    <div id="content_hasil" class="row mt-3 mb-3 ml-3 mr-3 w-auto p-3" style="padding: 15px; border: 1px solid #000;">
        <div class="col-sm-6">
            <h4 class="mb-3 mt-3"><b>Data Diri</b></h4>
        </div>

        <div class="col-sm-6">
            <h6 class="mb-3 mt-3 float-end"><i>Tanggal: <?= $data['tanggal'] ?></i></h6>
        </div>

        <div class="col-sm-6">
            <div class="mb-3 mt-3">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" name="nama" disabled value="<?= $data['nama'] ?>">
                    </div>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <div class="form-group row">
                    <label for="inputAge" class="col-sm-3 col-form-label">Umur</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputAge" name="umur" disabled value="<?= $data['umur'] ?>">
                    </div>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <div class="form-group row">
                    <label for="inputSex" class="col-sm-3 col-form-label">J/K</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputSex" name="jenis_kelamin" disabled value="<?php if ($data['jenis_kelamin'] == "p") { echo "Perempuan"; } else { echo "Laki-laki"; }?>">
                    </div>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-3 col-form-label">Domisili</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputAddress" name="domisili" disabled value="<?= $data['domisili'] ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <p><b><u>Hasil Defuzzifikasi: </u></b></p>
            <h3><span class="badge bg-primary"><?= $hasil['defuzzifikasi'] ?></span></h3>
            <h5><span class="badge bg-secondary"><?= $hasil['penyakit'] ?></span></h5>
        </div>

        <hr>

        <div class="col-sm-6">
            <h4 class="mb-3"><b>Pilihan Jawaban</b></h4>

            <?php 
            foreach ($pilihanInput as $key => $value) { ?>
                <div class="mb-3 mt-3">
                    <div class="form-group">
                        <label for="inputGejala" class="form-label"><?php
                        if ($value['id_gejala'] == 0) {
                            echo "Gejala Perut";
                        } if ($value['id_gejala'] == 1) {
                            echo "Gejala Mirip Flu";
                        } if ($value['id_gejala'] == 2) {
                            echo "Gejala Mata";
                        } if ($value['id_gejala'] == 3) {
                            echo "Gejala Kulit";
                        } if ($value['id_gejala'] == 4) {
                            echo "Gejala Sendi";
                        }
                        ?></label>
                        <input type="text" class="form-control" id="inputGejala" name="nama_gejala[]" disabled value="<?= $value['all_sub_gejala'] ?>">
                    </div>
                </div>
            <?php
            } ?>
        </div>

        <div class="col-sm-6">
            <h4 class="mb-3"><b>Solusi</b></h4>
            <?php
                foreach ($solusi as $key => $value) { ?>
                    <li><?= $value['deskripsi_solusi'] ?></li>
                <?php
                }
            ?>
        </div>


        <hr>

        <div class="col-sm-12">
            <h4 class="mb-3 mt-3"><b>Perhitungan</b></h4>
        </div>

        <div class="col-sm-12">
            <p><b><u>Hasil Fuzzifikasi</u></b></p>

            <?php
                foreach ($gejala as $key => $value) { ?>
                    <div class="mb-3 mt-3">
                        <div class="form-group">
                            <label for="inputGejala" class="form-label"><b><?= $value['nama_gejala'] ?></b></label>
                            <?php
                                foreach ($himpunan[$value['id_gejala']] as $key => $value2) {
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <p><?= $value2['nama_himpunan'] ?></p>
                                            </div>
                                            <div class="col-sm-1">
                                                <p class="float-end"> : </p>
                                            </div>
                                            <div class="col-sm-10">
                                                <p><?= $hasil['nilai_keanggotaan'][$value['id_gejala']][$value2['id_himpunan']] ?></p>
                                            </div>
                                        </div>
                                <?php
                                }
                            ?>

                        </div>
                    </div>  
                <?php
                }
            ?>
        </div>

        <p>
            <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Lihat selengkapnya
            </button>
        </p>
        
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <p><b><u>Firing-strength</u></b></p>

                        <?php
                        $sum_predikat = 0;
                        $array_predikat = array();
                        foreach ($hasil['predikat'] as $key => $value) {
                            echo "<p>" . $key . " -> " . $value . "</p>";
                            $sum_predikat = $sum_predikat + $value;
                            array_push($array_predikat, $value);
                            //if ($value != 0) {
                            //    echo "<p>" . $key . " -> " . $value . "</p>";
                            //    $sum_predikat = $sum_predikat + $value;
                            //    array_push($array_predikat, $value);
                            //} else {

                            //}
                        }
                        ?>
                        <p>ΣFiring-strength = <?= $sum_predikat ?></p>

                    </div>

                    <div class="col-sm-3">
                        <p><b><u>Nilai y(i)</u></b></p>

                        <?php
                        $sum_nilai_z = 0;
                        $array_nilai_z = array();
                        foreach ($hasil['nilai_z'] as $key => $value) {
                            echo "<p>" . $key . " -> " . $value . "</p>";
                            array_push($array_nilai_z, $value);
                            //if ($value == 50) {

                            //} elseif ($value == 30) {

                            //} else {
                            //    echo "<p>" . $key . " -> " . $value . "</p>";
                            //    array_push($array_nilai_z, $value);
                            //}
                        }
                        ?>
                    </div>

                    <div class="col-sm-5">
                        <p><b><u>Hasil Kali Firing-strength & Nilai y(i)</u></b></p>

                        <?php
                        $hasil_kali_pre_nilai_z = array_map("compute_mult", $array_predikat, $array_nilai_z);
                        foreach ($hasil_kali_pre_nilai_z as $key => $value) {
                            echo "<p>= " . $value . "</p>";
                        }
                        ?>
                        <?php

                        $hasil_kali_pre_nilai_z_ba = array_sum($hasil_kali_pre_nilai_z);

                        ?>
                        <p>Σ = <?= $hasil_kali_pre_nilai_z_ba ?></p>
                    </div>

                    <p></p>

                    <div class="col-sm-6">
                        <p><b>Maka, </b></p>
                        <p><?= $hasil_kali_pre_nilai_z_ba ?> ÷ <?= $sum_predikat ?></p>
                        <h4><b>= <?= $hasil['defuzzifikasi'] ?></b></h4>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="col-sm-12">
    <button class="btn btn-primary btn-lg float-end mt-3 mb-3" id="downloadPDF"><i class="bi bi-save"></i> Download PDF</button>
</div>

<?php

function compute_mult($v1, $v2){
  return $v1 * $v2;
}

?>

<?= $this->endSection() ?>