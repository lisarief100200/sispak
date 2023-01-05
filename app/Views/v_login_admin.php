<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <title>Sistem Pakar Diagnosa Awal Penyakit Hepatitis B</title>

        <!-- Important to make website responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="<?= base_url('/images')?>/logo.png">

        <!-- Link to bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <!-- Link to Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">       

        <style>
        *{
            margin: 0 0;
            padding: 0 0;
            font-family: verdana;
        }
        </style>
    <head>

    <body>
        <div class="container-fluid h-100 bg-light text-dark position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">

                    <div class="text-center">
                        <h1>Login Admin</h1>    
                    </div>
                    <hr/>
                    
                    <div class="text-center">
                        <img class="img-center" src="<?= base_url('/images')?>/logo.png" alt="" width="150" height="150">
                    </div>

                    <br>

                    <?php
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="danger">
                            <?php foreach ($errors as $error): ?>
                                <li><b><?= esc($error) ?></b></li>
                            <?php endforeach ?>
                        </div>  
                    <?php
                    }
                    ?>

                    <?php
                    if (session()->getFlashdata('pesan')) {
                        echo "<div class='alert alert-danger' role='danger'><b>";
                        echo session()->getFlashdata('pesan');
                        echo "</b></div>";
                    }
                    ?>

                    <?php echo form_open('auth/cek_login_admin'); ?>
                    <form class="text-center" action="" method="POST">
                        <br>

                        <div class="mb-3 form-group">
                            <label for="inputUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="username">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>

                        <a href="<?= base_url() ?>"> <i class="bi bi-globe2"></i> Website</a>
                        <button type="submit" class="btn btn-primary float-end" name="submit">Submit</button>
                        <br>
                        <br>
                    </form>
                    <?php echo form_close(); ?>

                    <div class="text-center">
                        <p>👨🏻‍⚕️ Sistem Pakar Diagnosa Awal Penyakit Hepatitis B 🩺</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>