                <?php
                    if ($value['type_gejala'] == "crisp") { ?>
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
                            ?>" id="inputGejala" name="id_gejala[<?= $value['id_gejala'] ?>]" required> <?= $value2['nama_himpunan'] ?>
                        <?php
                        }
                        ?>
                <?php
                    } else {
                        foreach ($subgejala as $key => $values) { 
                            if ($values['id_gejala'] == $value['id_gejala']) { ?>
                                <div class="form-check">
                                    <input class="form-check-input nama_gejala<?= $value['id_gejala'] ?>" type="checkbox" id="inputSubgejala[<?= $values['id_sub_gejala'] ?>]" name="id_sub_gejala[<?= $values['id_sub_gejala'] ?>]" value="<?= $values['nama_sub_gejala'] ?>">
                                    <label class="form-check-label" for="inputSubgejala[<?= $values['id_sub_gejala'] ?>]">
                                    <?= $values['ket_sub_gejala'] ?>
                                    </label>
                                </div>
                            <?php
                            }?>

                        <?php
                        }
                    ?>
                        <input type="text" id="nama_gejala<?= $value['id_gejala'] ?>" value="1">
                        
                <?php
                
                    }
                ?>


<?php //Buat jaga2 code buat data lama ?>

<?php
    foreach ($gejala as $key => $value) { ?>
        <div class="mb-3">
            <div class="form-group">
                <label for="inputGejala" class="form-label"><?= $value['pertanyaan_gejala'] ?></label>
                <?php
                    if ($value['type_gejala'] == "crisp") { ?>
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
                            ?>" id="inputGejala" name="id_gejala[<?= $value['id_gejala'] ?>]" required> <?= $value2['nama_himpunan'] ?>
                        <?php
                        }
                        ?>
                <?php
                    } else { ?>
                    <input class="form-control" type="number" name="id_gejala[<?= $value['id_gejala'] ?>]">       
                <?php
                    }
                ?>
            </div>
        </div>  
    <?php
    }
    ?>


<?= $this->extend('template/template_user') ?>

<?= $this->section('content') ?>

<h1 class="text-center" style="margin-top:2%; margin-bottom:2%;">Sistem Pakar Deteksi Dini Penyakit Hepatitis B</h1> 

<?php echo form_open('deteksi/addData'); ?>

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
    foreach ($gejala as $key => $value) { ?>
        <div class="mb-3">
            <div class="form-group">
                <label for="inputGejala" class="form-label"><?= $value['pertanyaan_gejala'] ?></label>
                <?php
                    if ($value['type_gejala'] == "crisp") { ?>
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
                            ?>" id="inputGejala" name="id_gejala[<?= $value['id_gejala'] ?>]" required> <?= $value2['nama_himpunan'] ?>
                        <?php
                        }
                        ?>
                <?php
                // BUAT KALAU GA CEKLIS APA2 == NULL YA
                    } else { 
                        // NANTI TULISA == Gejala perut
                        if ($value['id_gejala'] == 10) { 
                            foreach ($subgejalaPerut as $key => $values) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inputSubgejala[<?= $values['id_sub_gejala'] ?>]" name="id_sub_gejalaPerut[]" value="<?= $values['nama_sub_gejala'] ?>">
                                    <label class="form-check-label" for="inputSubgejala[<?= $values['id_sub_gejala'] ?>]">
                                    <?= $values['ket_sub_gejala'] ?>
                                    </label>
                                </div>
                            <?php
                            } ?>
                        <?php
                        } if ($value['id_gejala'] == 11) {
                            foreach ($subgejalaFlu as $key => $values) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inputSubgejala[<?= $values['id_sub_gejala'] ?>]" name="id_sub_gejalaFlu[]" value="<?= $values['nama_sub_gejala'] ?>">
                                    <label class="form-check-label" for="inputSubgejala[<?= $values['id_sub_gejala'] ?>]">
                                    <?= $values['ket_sub_gejala'] ?>
                                    </label>
                                </div>
                            <?php
                            } ?>
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

    <button type="submit" class="btn btn-primary float-end btn-lg">Cek Sekarang</button>

<?php echo form_close(); ?>

        <div class="col-sm-4">
            <p><b><u>Firing-strength (Tidak 0)</u></b></p>

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
            <p><b><u>Hasil Kali Firing-strength dan Nilai y(i)</u></b></p>

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

    <div class="col-sm-6">
        <p><b>Maka, </b></p>
        <p><?= $hasil_kali_pre_nilai_z_ba ?> ÷ <?= $sum_predikat ?></p>
        <h4><b>= <?= $hasil['defuzzifikasi'] ?></b></h4>
    </div>

<?= $this->endSection() ?>



























<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }
    public function index($error = NULL) { 
        redirect(base_url(),'refresh');
    }

    public function login() {
        //CAPTCHA================================//
        $cpt = $this->input->post("cpt",TRUE);
        $rescpt = $this->input->post("rescpt",TRUE);
        if ($cpt!=$rescpt){
            $this->session->set_flashdata('msgcaptcha', '<i class="fa fa-warning"></i> Captcha belum tepat, silakan ulangi lagi');
            redirect(site_url(''));
        }
        die("login berhasil");

// untuk pengecekan loginnya silakan buka comment di bawah ini, dan pastikan anda sudah membuat tabel users


/*
        //ENDOFCAPTCHA=========================//
        //sebut nama tabel yg akan dicek login
        $data_tbl = array('users');
        foreach ($data_tbl as $key => $vtbl) {
        $login = $this->Auth_model->login_multitable($this->input->post('username'), md5($this->input->post('password')),$vtbl);
            if ($login == 1) {
                // die($value."=".$login);
//          ambil detail data
            $row = $this->Auth_model->data_login_multitable($this->input->post('username'), md5($this->input->post('password')),$vtbl);
            switch ($vtbl) { //sesuai id di tabel user_group
                case 'users':
                    $grup = 1;
                    break;
                
            }
//          daftarkan session
            $data = array(
                'logged' => TRUE,
                'id_user' => $row->id_user,
                'username' => $row->username,
                'fullname' => $row->fullname,
                'telp' => $row->telp,
                'email' => $row->email,
                'foto' => $row->foto,
                'level' => $grup
            );
            $this->session->set_userdata($data);

//            redirect ke halaman sukses
            redirect(site_url('backend'));
        } 
        }
//            tampilkan pesan error
            $error = 'username / password salah';
            $this->index($error);
*/
        
    }

    function logout() {
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect(site_url('auth'));
    }

}