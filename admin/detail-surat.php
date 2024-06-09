<?php 
$title = 'Detail Surat';
include 'skeleton/header.php';

$id = (int)$_GET['id'];
$surat = query("SELECT s.*, ms.nama_surat FROM surat s LEFT JOIN ms_surat ms ON ms.id = s.id_jenis WHERE s.id = $id")[0];
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="card card-outline card-primary shadow">
              <div class="card-header">
                <h3 class="card-title">Layanan Adminstrasi | <?= $title ?></h3>

                <!-- <div class="card-tools">
                  <a class="btn btn-sm btn-primary" href="tambah-akun.php">
                     Tambah Akun <i class="fas fa-plus"></i>
                  </a>
                </div> -->
                
              </div>
              <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $surat['id'] ?>">
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nik"><b>NIK</b></label>
                      <input type="text" name="nik" id="nik" class="form-control" maxlength="16" minlength="16" value="<?= $surat['nik']; ?>" required disabled>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $surat['tempat_lahir']; ?>" required disabled>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama"><b>Nama</b></label>
                      <input type="text" name="nama" id="nama" class="form-control" value="<?= $surat['nama']; ?>" required disabled>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                      <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $surat['tanggal_lahir']; ?>" required disabled>
                    </div>
                  </div>      
                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="pekerjaan"><b>Pekerjaan</b></label>
                      <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="<?= $surat['pekerjaan']; ?>" required disabled>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="agama"><b>Agama</b></label>
                      <input type="text" name="agama" id="agama" class="form-control" value="<?= $surat['agama']; ?>" required disabled>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="jenKel"><b>Jenis Kelamin</b></label>
                      <input type="text" name="agama" id="agama" class="form-control" value="<?= $surat['jenKel'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?>" required disabled>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="status"><b>Status Pernikahan</b></label>
                      <input type="text" name="agama" id="agama" class="form-control" value="<?= $surat['sttaus'] == 'N' ? 'Menikah' : 'Belum Menikah'; ?>" required disabled>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="email"><b>Email</b></label>
                      <input type="email" name="email" id="email" class="form-control" value="<?= $surat['agama']; ?>" required disabled>
                      <small class="text-danger">*Email yang masih aktif</small>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="no_hp"><b>Telepon</b></label>
                      <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?= $surat['no_hp']; ?>" required disabled>
                      <small class="text-danger">*No HP/Wa yang bisa dihubungi</small>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-lg-12 mt-4">
                      <label for="alamat"><b>Alamat</b></label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control">
                      <?= $surat['alamat']; ?>
                      </textarea>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-12 mt-4">
                    <label for="file" class="form-label"><b>File</b></label>
                  </div>
                  </div>



              </div>
            </div>

        </div>
      </section>
      <!-- /.content -->
    </div>


<?php 
include 'skeleton/footer.php';
?>