<?php 

$title = 'Sejarah';
include 'skeleton/header.php';


$sejarah = query("SELECT s.*, COALESCE(u.nama,'-') AS namaUpdatedBy FROM sejarah s LEFT JOIN user u ON u.id = s.updatedBy WHERE 1=1")[0];

if (isset($_POST['submit'])) {
  if (update_sejarah($_POST) > 0) {
      echo "<script>
          alert('Data Berhasil Diupdate...');
          document.location.href = 'sejarah.php';
        </script>";
  } else {
      echo "<script>
          alert('Data Gagal Diupdate');
          document.location.href = 'sejarah.php';
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
              <h1 class="m-0">Sejarah</h1>
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
                <h3 class="card-title">Sejarah</h3>
              </div>
              
              <div class="card-body row">
                <div class="col-lg-12 col-sm-6">
                    <div class="card">
                        <div class="card-header bg-secondary">
                        <h5 class="text-center text-bold">Sejarah</h5>
                        </div>
                        <div class="card-body">
                          
                            <p><b>Judul</b></p>
                            <?= $sejarah['judul']; ?>
                            <hr>
                            <p><b>Isi</b></p>
                            <?= $sejarah['isi']; ?>
                            <hr>
                            <p><b>Gambar</b></p>
                            <div class="row">
            <div class="col-lg-3"></div>
                    <div class="text-center col lg-6">
                        <img src="./public/image/img/<?= $sejarah['picture']; ?>" alt="" class="mt-2" width="100px">
                    </div>
                    <div class="col-lg-3"></div>
            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-6">
                    <div class="alert alert-secondary">
                        <span> Terakhir di updated oleh : <b><?= $sejarah['namaUpdatedBy'] ?></b></span><br>
                        <span> Pada : <b><?= date('d/m/Y h:i', strtotime($sejarah['updatedAt'])); ?></b></span><br>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Update Sejarah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $sejarah['id']; ?>">
            <input type="hidden" name="updatedBy" value="<?= $_SESSION['id']; ?>">
            <input type="hidden" name="fotoLama" value="<?= $sejarah['picture']; ?>">
            
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" name="judul" id="judul" class="form-control" required value="<?= $sejarah['judul']; ?>">
            </div>

            <div class="form-group">
              <label for="isi">Isi</label>
              <textarea name="isi" id="isi" cols="10" rows="5" class="form-control" required><?= $sejarah['isi']; ?>
              </textarea>
            </div>

            <div class="form-group" >
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file" value="<?= $sejarah['picture'] ?>" onchange="previewImg()" accept="image/*">
                            <label class="custom-file-label" for="file">Choose file...</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>

                        
              </div>

            <div class="row">
            <div class="col-lg-3"></div>
                    <div class="text-center col lg-6">
                        <img src="./public/image/img/<?= $sejarah['picture']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">
                    </div>
                    <div class="col-lg-3"></div>
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

<script>
    function previewImg() {
        const foto = document.querySelector('#file');
        const preview = document.querySelector('.img-preview');
        
        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e){
            preview.src = e.target.result;
        }
        
    }
    </script>


<?php 

include 'skeleton/footer.php';
?>