<?php
$title = "Form-Surat";


include "skeleton/header.php";

$id = (int)$_GET['id'];
$surat = query("SELECT * FROM `ms_surat` WHERE 1=1 AND id = $id")[0];

if (isset($_POST['submit-sktm'])) {
  if (insert_surat_sktm($_POST) > 0) {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'index.php';
        </script>";
  } else {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'form-surat.php';
        </script>";
  }
}

if (isset($_POST['surat-domisili'])) {
  if (insert_surat_domisili($_POST) > 0) {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'index.php';
        </script>";
  } else {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'form-surat.php';
        </script>";
  }
}

if (isset($_POST['surat-sku'])) {
  if (insert_surat_usaha($_POST) > 0) {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'index.php';
        </script>";
  } else {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'form-surat.php';
        </script>";
  }
}


if (isset($_POST['surat-kematian'])) {
  if (insert_surat_kematian($_POST) > 0) {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'index.php';
        </script>";
  } else {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'form-surat.php';
        </script>";
  }
}


if (isset($_POST['surat-nikah'])) {
  if (insert_surat_nikah($_POST) > 0) {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'index.php';
        </script>";
  } else {
      echo "<script>
      alert('Data berhail ditambahkan...');
          document.location.href = 'form-surat.php';
        </script>";
  }
}

 ?>

<main id="main">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Informasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
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
                <h3 class="card-title">Form Pengajuan <?= $surat['nama_surat'] ?></h3>
              </div>
              
              <?php if ($surat['id'] == 1) { ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_surat" value="<?= $surat['id'] ?>">
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nik"><b>NIK</b></label>
                      <input type="text" name="nik" id="nik" class="form-control" maxlength="16" minlength="16" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama"><b>Nama</b></label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                      <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                    </div>
                  </div>      
                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="pekerjaan"><b>Pekerjaan</b></label>
                      <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="agama"><b>Agama</b></label>
                      <input type="text" name="agama" id="agama" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="jenKel"><b>Jenis Kelamin</b></label>
                      <select class="form-select" name="jenKel" id="jenKel" aria-label="Default select example">
                        <option selected>Pilih jenis kelamain...</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="status"><b>Status Pernikahan</b></label>
                      <select class="form-select" name="status" id="status" aria-label="Default select example">
                        <option selected>Pilih status pernikahan...</option>
                        <option value="N">Menikah</option>
                        <option value="BN">Belum Menikah</option>
                      </select>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="email"><b>Email</b></label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <small class="text-danger">*Email yang masih aktif</small>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="no_hp"><b>Telepon</b></label>
                      <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                      <small class="text-danger">*No HP/Wa yang bisa dihubungi</small>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-lg-12 mt-4">
                      <label for="alamat"><b>Alamat</b></label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-12 mt-4">
                    <label for="file" class="form-label"><b>Upload File</b></label>
                    <input class="form-control" id="file" name="file" type="file" accept="image/*">
                    <small class="text-danger">*File berupa KTP/KK</small>
                  </div>
                  </div>


                <div class="card-footer mt-4">
                  <div class="d-flex justify-content-end">

                    <button type="submit" name="submit-sktm" class="btn btn-sm btn-primary">
                      Submit
                    </button>
                  </div>
                </div>

                </form>
              </div>
              <?php } ?>

              <?php if ($surat['id'] == 2) { ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_surat" value="<?= $surat['id'] ?>">

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nik"><b>NIK</b></label>
                      <input type="text" name="nik" id="nik" class="form-control" maxlength="16" minlength="16" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama"><b>Nama</b></label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                      <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                    </div>
                  </div>      
                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="pekerjaan"><b>Pekerjaan</b></label>
                      <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="agama"><b>Agama</b></label>
                      <input type="text" name="agama" id="agama" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="jenKel"><b>Jenis Kelamin</b></label>
                      <select class="form-select" name="jenKel" id="jenKel" aria-label="Default select example">
                        <option selected>Pilih jenis kelamain...</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="status"><b>Status Pernikahan</b></label>
                      <select class="form-select" name="status" id="status" aria-label="Default select example">
                        <option selected>Pilih status pernikahan...</option>
                        <option value="N">Menikah</option>
                        <option value="BN">Belum Menikah</option>
                      </select>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="email"><b>Email</b></label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <small class="text-danger">*Email yang masih aktif</small>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="no_hp"><b>Telepon</b></label>
                      <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                      <small class="text-danger">*No HP/Wa yang bisa dihubungi</small>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-lg-12 mt-4">
                      <label for="alamat"><b>Alamat</b></label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-12 mt-4">
                    <label for="file" class="form-label"><b>Upload File</b></label>
                    <input class="form-control" id="file" name="file" type="file" accept="image/*">
                    <small class="text-danger">*File berupa KTP/KK</small>
                  </div>
                  </div>


                <div class="card-footer mt-4">
                <div class="d-flex justify-content-end">
                  <button type="submit" name="surat-domisili" class="btn btn-sm btn-primary float-right">Submit</button>
                </div>
                </div>

                </form>
              </div>
              <?php } ?>

              <?php if ($surat['id'] == 3) { ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_surat" value="<?= $surat['id'] ?>">

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nik"><b>NIK</b></label>
                      <input type="text" name="nik" id="nik" class="form-control" maxlength="16" minlength="16" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama"><b>Nama</b></label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                      <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                    </div>
                  </div>      
                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="pekerjaan"><b>Pekerjaan</b></label>
                      <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="agama"><b>Agama</b></label>
                      <input type="text" name="agama" id="agama" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="jenKel"><b>Jenis Kelamin</b></label>
                      <select class="form-select" name="jenKel" id="jenKel" aria-label="Default select example">
                        <option selected>Pilih jenis kelamain...</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="status"><b>Status Pernikahan</b></label>
                      <select class="form-select" name="status" id="status" aria-label="Default select example">
                        <option selected>Pilih status pernikahan...</option>
                        <option value="N">Menikah</option>
                        <option value="BN">Belum Menikah</option>
                      </select>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="email"><b>Email</b></label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <small class="text-danger">*Email yang masih aktif</small>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="no_hp"><b>Telepon</b></label>
                      <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                      <small class="text-danger">*No HP/Wa yang bisa dihubungi</small>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="keperluan_surat"><b>Keperluan Surat</b></label>
                      <input type="text" name="keperluan_surat" id="keperluan_surat" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama_usaha"><b>Nama Usaha</b></label>
                      <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" required>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="alamat"><b>Alamat</b></label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="alamat_usaha"><b>Alamat Usaha</b></label>
                      <textarea name="alamat_usaha" id="alamat_usaha" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-12 mt-4">
                    <label for="file" class="form-label"><b>Upload File</b></label>
                    <input class="form-control" id="file" name="file" type="file" accept="image/*">
                    <small class="text-danger">*File berupa KTP/KK/Foto Usaha</small>
                  </div>
                  </div>


                <div class="card-footer mt-4">
                <div class="d-flex justify-content-end">
                  <button type="submit" name="surat-sku" class="btn btn-sm btn-primary float-right">Submit</button>
                </div>
                </div>

                </form>
              </div>
              <?php } ?>

              <?php if ($surat['id'] == 4) { ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                  
                <input type="hidden" name="id_surat" value="<?= $surat['id'] ?>">

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nik"><b>NIK</b></label>
                      <input type="text" name="nik" id="nik" class="form-control" maxlength="16" minlength="16" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama"><b>Nama</b></label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                      <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                    </div>
                  </div>      
                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="pekerjaan"><b>Pekerjaan</b></label>
                      <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="agama"><b>Agama</b></label>
                      <input type="text" name="agama" id="agama" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="jenKel"><b>Jenis Kelamin</b></label>
                      <select class="form-select" name="jenKel" id="jenKel" aria-label="Default select example">
                        <option selected>Pilih jenis kelamain...</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="status"><b>Status Pernikahan</b></label>
                      <select class="form-select" name="status" id="status" aria-label="Default select example">
                        <option selected>Pilih status pernikahan...</option>
                        <option value="N">Menikah</option>
                        <option value="BN">Belum Menikah</option>
                      </select>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="email"><b>Email</b></label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <small class="text-danger">*Email yang masih aktif</small>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="no_hp"><b>Telepon</b></label>
                      <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                      <small class="text-danger">*No HP/Wa yang bisa dihubungi</small>
                    </div>
                  </div>

                  
                  <div class="row">
                  <div class="form-group col-lg-6 mt-4">
                      <label for="penyebab_kematian"><b>Penyebab Kematian</b></label>
                      <input type="text" name="penyebab_kematian" id="penyebab_kematian" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="tanggal_kematian"><b>Tanggal Kematian</b></label>
                      <input type="datetime-local" name="tanggal_kematian" id="tanggal_kematian" class="form-control" required>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="alamat"><b>Alamat</b></label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="lokasi_kematian"><b>Lokasi Kematian</b></label>
                      <textarea name="lokasi_kematian" id="lokasi_kematian" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-12 mt-4">
                    <label for="file" class="form-label"><b>Upload File</b></label>
                    <input class="form-control" id="file" name="file" type="file" accept="image/*">
                    <small class="text-danger">*File berupa KTP/KK/Foto Eviden</small>
                  </div>
                  </div>


                <div class="card-footer mt-4">
                <div class="d-flex justify-content-end">
                  <button type="submit" name="surat-kematian" class="btn btn-sm btn-primary float-right">Submit</button>
                </div>
                </div>

                </form>
              </div>
              <?php } ?>

                            
              <?php if ($surat['id'] == 5) { ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                  
                <input type="hidden" name="id_surat" value="<?= $surat['id'] ?>">

                <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nik"><b>NIK</b></label>
                      <input type="text" name="nik" id="nik" class="form-control" maxlength="16" minlength="16" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tempat_lahir"><b>Tempat Lahir</b></label>
                      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama"><b>Nama</b></label>
                      <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
                      <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                    </div>
                  </div>      
                  
                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="pekerjaan"><b>Pekerjaan</b></label>
                      <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="agama"><b>Agama</b></label>
                      <input type="text" name="agama" id="agama" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="jenKel"><b>Jenis Kelamin</b></label>
                      <select class="form-select" name="jenKel" id="jenKel" aria-label="Default select example">
                        <option selected>Pilih jenis kelamain...</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-lg-6 mt-4">
                      <label for="status"><b>Status Pernikahan</b></label>
                      <select class="form-select" name="status" id="status" aria-label="Default select example">
                        <option selected>Pilih status pernikahan...</option>
                        <option value="N">Menikah</option>
                        <option value="BN">Belum Menikah</option>
                      </select>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="email"><b>Email</b></label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <small class="text-danger">*Email yang masih aktif</small>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="no_hp"><b>Telepon</b></label>
                      <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                      <small class="text-danger">*No HP/Wa yang bisa dihubungi</small>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-lg-12 mt-4">
                      <label for="alamat"><b>Alamat</b></label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama_ortu_lk"><b>Nama Orangtua Laki-laki</b></label>
                      <input type="text" name="nama_ortu_lk" id="nama_ortu_lk" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-6 mt-4">
                      <label for="nama_ortu_pr"><b>Nama Orangtua Perempuan</b></label>
                      <input type="text" name="nama_ortu_pr" id="nama_ortu_pr" class="form-control" required>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-12 mt-4">
                    <label for="file" class="form-label"><b>Upload File</b></label>
                    <input class="form-control" id="file" name="file" type="file" accept="image/*">
                    <small class="text-danger">*File berupa KTP/KK</small>
                  </div>
                  </div>

                <div class="card-footer mt-4">
                <div class="d-flex justify-content-end">
                  <button type="submit" name="surat-nikah" class="btn btn-sm btn-primary float-right">Submit</button>
                </div>
                </div>

                </form>
              </div>
              <?php } ?>

            </div>

        
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</main>


<?php 
include 'skeleton/footer.php'
?>