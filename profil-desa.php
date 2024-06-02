<?php
$title = "Profil-Desa";


include "skeleton/header.php";
$sejarah = query("SELECT * FROM sejarah WHERE 1=1")[0];
$visi_misi = query("SELECT * FROM visi_misi WHERE 1=1")[0];

 ?>

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <div class="row">
            <div class="col-lg-4">
              <img src="./skeleton/assets/img/poltek.jpg" alt="Profil" width="100%" height="100%">
            </div>
            <div class="col-lg-8">
            <h2>Profil Desa</h2>

<h5><b><?= $sejarah['judul'] ?></b></h5><br>
<p><?=$sejarah['isi']; ?></p><br>

<h5><b>Visi</b></h5>
<p><?= $visi_misi['visi']; ?></p><br>

<h5><b>Misi</b></h5>
<p><?= $visi_misi['misi'] ?></p><br>
            </div>
          </div>

        </div>

        <div class="row content">
            
        </div>

      </div>
    </section><!-- End About Section -->
</main>


<?php 
include 'skeleton/footer.php'
?>