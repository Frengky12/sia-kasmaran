<?php 

$title = 'Informasi';
include 'skeleton/header.php';

$id = (int)$_GET['id'];
$berita = query("SELECT * FROM informasi WHERE id = $id")[0];

if (isset($_POST['submit'])) {
  if (edit_informasi($_POST) > 0) {
      echo "<script>
      alert('Data berhasil diedit...');
          document.location.href = 'informasi.php';
        </script>";
  } else {
      echo "<script>
      alert('Data gagal diedit...');
          document.location.href = 'informasi.php';
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
              <h1 class="m-0">Informasi</h1>
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
                <h3 class="card-title">Edit Informasi</h3>

                <div class="card-tools">
                  <a href="informasi.php" class="btn btn-sm btn-primary">
                    <i class="fas fa-arrow-left"></i> Back
                  </a>
                </div>
              </div>
              
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="createdBy" value="<?= $_SESSION['id'] ?>">
                  <input type="hidden" name="id" value="<?= $berita['id'] ?>">
                  <input type="hidden" name="fotoLama" value="<?= $berita['picture'] ?>">
                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" required autocomplete="off" value="<?= $berita['judul']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="editor">Isi</label>
                    <textarea name="isi" id="editor" class="form-control" cols="30" rows="10">
                      <?= $berita['isi'] ?>
                    </textarea>
                  </div>

                  <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input required type="file" class="custom-file-input" id="file" name="file" value="<?= $berita['picture'] ?>" onchange="previewImg()" accept="image/*">
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
                        <img src="./public/image/berita/<?= $berita['picture'] ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">
                    </div>
                    <div class="col-lg-3"></div>
                    </div>

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-sm btn-primary float-right">Submit</button>
                </div>

                </form>
              </div>

            </div>

        
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
      ClassicEditor.create( document.querySelector( '#editor' ) );

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