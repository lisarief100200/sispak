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
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>
        <!-- Link to Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>    
        <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>    
    <head>

    <body class="d-flex flex-column h-100">
        <!-- Navbar starts here -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url(); ?>/images/logo.png" alt="" width="50" height="50">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
                        <a class="nav-link" href="<?= base_url('deteksi') ?>">Diagnosa</a>
                        <a class="nav-link" href="<?= base_url('penularan')?>">Penularan Hepatitis B</a>
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

<script>
    window.html2canvas = html2canvas;
    window.jsPDF = window.jspdf.jsPDF;

    function makePDF() {
        html2canvas(document.querySelector("#content_hasil"), {
            allowTaint:true,
            useCORS: true,
            scale: 1
        }).then(canvas => {
            var img = canvas.toDataURL("image/png");
            var doc = new jsPDF();
            doc.setFont('Arial');
            doc.getFontSize(11);
            doc.addImage(img, 'PNG', 7, 13, 195, 250);
            doc.save("hasil");
        });
    }
</script>

</html>