<?= $this->extend('template/template_admin') ?>

<?= $this->section('content') ?>
        
    <h4 style="margin-top:2%; margin-bottom:2%;">Beranda Admin</h1> 

    <div class="row">

        <div class="col-4">
            <div class="card bg-success text-white" style="width: 18rem; height: 8rem">
                <div class="card-body">
                    <h5 class="card-title text-center"><b><?= $total_penyakit1 ?></b></h5>
                    <p class="card-text text-center">Perawatan di rumah</p>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card bg-warning" style="width: 18rem; height: 8rem">
                <div class="card-body">
                    <h5 class="card-title text-center"><b><?= $total_penyakit2 ?></b></h5>
                    <p class="card-text text-center">Melakukan Pemeriksaan</p>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card bg-danger text-white" style="width: 18rem; height: 8rem">
                <div class="card-body">
                    <h5 class="card-title text-center"><b><?= $total_penyakit3 ?></b></h5>
                    <p class="card-text text-center">Memerlukan Perawatan Darurat</p>
                </div>
            </div>
        </div>
    
    </div>

<?= $this->endSection() ?>