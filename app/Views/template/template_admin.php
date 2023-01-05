<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <title><?= $title; ?> | <?= $subtitle; ?></title>

        <!-- Important to make website responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?= base_url(); ?>/images/logo.png">

        <!-- Link our CSS file -->
        <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

        <!-- Link to bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <!-- Link to Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">    
    <head>

    <body class="d-flex flex-column h-100">
        <!-- Navbar starts here -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="<?= base_url('admin') ?>">Beranda</a>
                        <a class="nav-link" href="<?= base_url('subgejala') ?>">Gejala</a>
                        <a class="nav-link" href="<?= base_url('himpunan')?>">Himpunan</a>
                        <a class="nav-link" href="<?= base_url('aturan')?>">Aturan</a>
                        <a class="nav-link" href="<?= base_url('solusi') ?>">Solusi</a>
                        <a class="nav-link" href="<?= base_url('pengguna') ?>">Pengguna</a>
                        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Log out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar ends here -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">

                <?= $this->renderSection('content') ?>

                </div>
            </div>
        </div>

        <!-- Footer Section Starts Here -->
        <footer class="footer mt-auto py-3">
            <div class="container text-center">
                <p>👨🏻‍⚕️ Sistem Pakar Diagnosa Awal Penyakit Hepatitis B 🩺</p>
            </div>
        </section>
        <!-- Footer Section Ends Here -->
    </body>

</html>