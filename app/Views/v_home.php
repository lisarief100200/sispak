<?= $this->extend('template/template_user') ?>

<?= $this->section('content') ?>
    <h2 class="text-center" style="margin-top:2%; margin-bottom:2%;">Sistem Pakar Diagnosa Awal Penyakit Hepatitis B</h2> 

    <div class="col-6">
        
        <p align="justify">
            Penyakit Hepatitis B disebabkan karena adanya peradangan pada organ hati yang disebabkan oleh infeksi virus HBV (Virus Hepatitis B). Penyakit menular ini menjadi salah satu permasalahan kesehatan pada masyarakat luas karena sangat berpengaruh terhadap angka harapan hidup, status kesehatan, dan jumlah angka kematian. Jika dibiarkan, penyakit Hepatitis B dapat berkembang ke penyakit menjadi penyakit lainnya seperti fibrosis (jaringan parut), sirosis hati, bahkan hingga kanker hati.
        </p>

        <p align="justify">
            Hepatitis B bisa disebabkan oleh berbagai faktor seperti penyakit autoimun, infeksi virus, dan zat beracun seperti alkohol dan obat-obatan tertentu. Penyebaran virus Hepatitis B tidak dapat melalui makanan atau kontak biasa tetapi melalui kontak cairan tubuh atau darah dari penderita yang terinfeksi. Selain itu, virus Hepatitis B dapat menyebar melalui kegiatan seksual, transfusi darah, dan penggunaan jarum suntik yang berulang.
        </p>

        <div class="d-grid">
            <a class="btn btn-dark" type="button" href="<?= base_url('deteksi') ?>">Cek Sekarang</a>
        </div>
        <br>
    </div>

    <div class="col-6">
        <img src="<?= base_url(); ?>/images/ilustrasi.jpg" width="100%" height="auto" style="border-radius:5px; ">
    </div>

<?= $this->endSection() ?>