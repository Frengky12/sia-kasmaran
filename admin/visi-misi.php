<?php 

$title = 'Visi Misi';
include 'skeleton/header.php';

<<<<<<< HEAD
$visi_misi = query("SELECT vm.*, COALESCE(u.nama,'-') AS namaUpdatedBy FROM visi_misi vm LEFT JOIN user u ON u.id = vm.updatedBy WHERE 1=1")[0];

if (isset($_POST['submit'])) {
=======
$visi_misi = query("SELECT vm.*, COALESCE(u.nama,'-') AS namaUpdatedBy FROM visi_misi vm LEFT JOIN user u ON u.id = vm.updatedBy WHERE u.deletedAt IS NULL")[0];

if (isset($_POST['update'])) {
>>>>>>> origin/master
    if (update_visi_misi($_POST) > 0) {
        echo "<script>
            alert('Data Berhasil Diupdate...');
            document.location.href = 'visi-misi.php';
          </script>";
    } else {
        echo "<script>
            alert('Data Gagal Diupdate');
            document.location.href = 'visi-misi.php';
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
              <h1 class="m-0">Visi & Misi</h1>
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
                <h3 class="card-title">Visi & Misi</h3>
              </div>
              
              <div class="card-body row">
                <div class="col-lg-12 col-sm-6">
                    <div class="card">
                        <div class="card-header bg-secondary">
                        <h5 class="text-center text-bold">Visi</h5>
                        </div>
                        <div class="card-body">
                            <?= $visi_misi['visi']; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-6">
                    <div class="card">
                        <div class="card-header bg-secondary">
                        <h5 class="text-center text-bold">Misi</h5>
                        </div>
                        <div class="card-body">
                            <?= $visi_misi['misi']; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-6">
                    <div class="alert alert-secondary">
                        <span> Terakhir di updated oleh : <b><?= $visi_misi['namaUpdatedBy']; ?></b></span><br>
                        <span> Pada : <b><?= date('d/m/Y h:i', strtotime($visi_misi['updatedAt'])); ?></b></span><br>
                    </div>

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
<<<<<<< HEAD
      <div class="modal-header bg-secondary text-white">
=======
      <div class="modal-header bg-success text-white">
>>>>>>> origin/master
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Update Visi & Misi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<<<<<<< HEAD

                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $visi_misi['id']; ?>">
                            <input type="hidden" name="updatedBy" value="<?= $_SESSION['id']; ?>">
=======
         <div class="modal-body">

                        <form action="" method="post">
                            <input type="text" name="id" value="<?= $visi_misi['id']; ?>">
                            <input type="text" name="updatedBy" value="<?= $_SESSION['id']; ?>">
>>>>>>> origin/master

                            <div class="form-group">
                              <label for="visi">Visi</label>
                              <textarea name="visi" id="visi" cols="30" rows="5" class="form-control" required><?= $visi_misi['visi']; ?></textarea>
                            </div>

                            <div class="form-group">
                              <label for="misi">Misi</label>
                              <textarea name="misi" id="misi" cols="30" rows="5" class="form-control" required><?= $visi_misi['misi']; ?></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary text-white btn-sm" data-dismiss="modal">Batal</button>
<<<<<<< HEAD
                                <button type="submit" name="submit" class="btn btn-primary text-white btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
=======
                                <button type="submit" name="update" class="btn btn-primary text-white btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
      </div>
>>>>>>> origin/master
    </div>
  </div>
</div>


<?php 

include 'skeleton/footer.php';
?>