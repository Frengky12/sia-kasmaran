<?php
$title = "Berita-Desa";


include "skeleton/header.php";

$id = (int)$_GET['id'];
$informasi = query("SELECT i.*, u.nama FROM `informasi` i LEFT JOIN user u ON u.id = i.createdBy WHERE i.id = $id AND i.deletedAt IS NULL ")[0];
 ?>

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <div class="row">
            <div class="col-lg-4">
              <img src="../sia-kasmaran/admin/public/image/berita/<?= $informasi['picture']; ?>" alt="Profil" width="100%" height="100%">
            </div>
            <div class="col-lg-8">
            <h2>Informasi</h2>

<h5><b><?= $informasi['judul'] ?></b></h5><br>
<p><?=$informasi['isi']; ?></p><br>

            </div>
          </div>

        </div>

        <div class="text-end">
        <small>
          Di Publish Oleh : <b><?= $informasi['nama']; ?></b>
        </small>
        </div>

      </div>
    </section><!-- End About Section -->
</main>


<?php 
include 'skeleton/footer.php'
?>