<?php 

$title = 'Akun';
include 'skeleton/header.php';

$id = (int)$_GET['id'];
$user = query("SELECT * FROM user WHERE id = $id")[0];

    if (isset($_POST['submit'])) {
       if (edit_akun($_POST) > 0) {
           echo "<script>
                       alert('Data Administrator Berhasil Diupdate');
                       document.location.href = 'akun.php';
               </script>";
       } else {
           echo "<script>
                       alert('Data Administrator Gagal Diupdate');
                       document.location.href = 'edit-akun.php?id=$id';
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
                <h3 class="card-title">Form Edit Akun</h3>

                <div class="card-tools">
                  <a href="akun.php" class="btn btn-sm btn-primary">
                    <i class="fas fa-arrow-left"></i> Back
                  </a>
                </div>
                
              </div>
              
              <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $user['foto']; ?>">

                <div class="card-body row">
                    <div class="form-group col-lg-6">
                        <label for="nama">Nama</label>
                        <input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama..." value="<?= $user['nama']; ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Username</label>
                        <input required type="text" id="username" name="username" class="form-control" placeholder="Username..." value="<?= $user['username']; ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input required type="email" id="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email..." value="<?= $user['email']; ?>">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputPassword1">Password</label>
                        <input required type="password" id="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password..." minlength="6">
                        <small class="text-danger">* Masukkan ulang password lama/ baru</small>
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Level User</label>
                        <select id="level" name="level" class="form-control">
                          <option selected>Level user...</option>
                          <option value="1" <?php if ($user['level'] == 1) echo 'selected'?>>Superadmin</option>
                          <option value="2" <?php if ($user['level'] == 2) echo 'selected'?>>Admin</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                        <div class="custom-file">
<<<<<<< HEAD
                            <input type="file" class="custom-file-input" id="file" name="file" value="<?= $user['foto'] ?>" onchange="previewImg()" accept="image/*">
=======
                            <input required type="file" class="custom-file-input" id="file" name="file" value="<?= $user['foto'] ?>" onchange="previewImg()" accept="image/*">
>>>>>>> origin/master
                            <label class="custom-file-label" for="file">Choose file...</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>

                        
                    </div>

                    <div class="col-lg-3"></div>
                    <div class="text-center col lg-6">
                        <img src="./public/image/foto-profil/<?= $user['foto']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">
                    </div>
                    <div class="col-lg-3"></div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-sm btn-primary float-right">Submit</button>
                </div>
              </form>
              
            </div>

        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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