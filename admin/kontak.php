<?php 

$title = 'Kontak';
include 'skeleton/header.php';

$kontak = query("SELECT k.*, COALESCE(u.nama,'-') AS namaUpdatedBy FROM kontak k LEFT JOIN user u ON u.id = k.updatedBy WHERE 1=1")[0];

if (isset($_POST['submit'])) {
  if (update_kontak($_POST) > 0) {
      echo "<script>
          alert('Data Berhasil Diupdate...');
          document.location.href = 'kontak.php';
        </script>";
  } else {
      echo "<script>
          alert('Data Gagal Diupdate');
          document.location.href = 'kontak.php';
        </script>";
  }
}
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Kontak</h1>
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
                <h3 class="card-title">Kontak</h3>
              </div>
              
              <div class="card-body">

              <div class="card card-outline card-secondary">
                <div class="card-header">Email</div>
                <div class="card-body"><?= $kontak['email']; ?></div>
              </div>
              
              <div class="card card-outline card-secondary">
                <div class="card-header">Alamat</div>
                <div class="card-body"><?= $kontak['alamat']; ?></div>
              </div>
              
              <div class="card card-outline card-secondary">
                <div class="card-header">WhatsApp</div>
                <div class="card-body">
                  <a href="http://wa.me/<?= $kontak['wa']; ?>" target="_blank" rel="noopener noreferrer"><?= $kontak['wa']; ?></a>
                </div>
              </div>
              
              <div class="card card-outline card-secondary">
                <div class="card-header">Instagram</div>
                <div class="card-body">
                  <a href="<?= $kontak['ig']; ?>" target="_blank" rel="noopener noreferrer"><?= $kontak['ig']; ?></a>
                </div>
              </div>
              
              <div class="card card-outline card-secondary">
                <div class="card-header">Facebook</div>
                <div class="card-body">
                  <a href="<?= $kontak['fb']; ?>" target="_blank" rel="noopener noreferrer"><?= $kontak['fb']; ?></a>
                </div>
              </div>

              <div class="alert alert-secondary">
                        <span> Terakhir di updated oleh : <b><?= $kontak['namaUpdatedBy']; ?></b></span><br>
                        <span> Pada : <b><?= date('d/m/Y h:i', strtotime($kontak['updatedAt'])); ?></b></span><br>
              </div>

              </div>

              <div class="card-footer">
                  <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modalUbah">Update</button>
                </div>

            </div>

        
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

        <!-- Modal -->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Update Kontak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" name="id" value="<?= $kontak['id']; ?>">
          <input type="hidden" name="updatedBy" value="<?= $_SESSION['id']; ?>">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $kontak['email']; ?>" required>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" required><?= $kontak['alamat']; ?>
            </textarea>
          </div>

          <div class="form-group">
            <label for="wa">WhatApps</label>
            <input type="text" name="wa" id="waa" class="form-control" value="<?= $kontak['wa']; ?>" required>
          </div>
          <div class="form-group">
            <label for="ig">Instagram</label>
            <input type="text" name="ig" id="ig" class="form-control" value="<?= $kontak['ig']; ?>" required>
          </div>
          <div class="form-group">
            <label for="fb">Facebook</label>
            <input type="text" name="fb" id="fb" class="form-control" value="<?= $kontak['fb']; ?>" required>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary text-white btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="submit" class="btn btn-primary text-white btn-sm">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php 

include 'skeleton/footer.php';
?>