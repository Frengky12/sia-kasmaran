<?php 
$title = 'Akun';
include 'skeleton/header.php';


    //     Swal.fire({
    //         icon: 'success',
    //         text: 'Data berhasil ditambahkan...'
    //         })
    // , 3000);
if (isset($_POST['submit'])) {
    if (tambah_akun($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan...');
            document.location.href = 'akun.php';
          </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan...');
            document.location.href = 'tambah-akun.php';
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
                <h3 class="card-title">Form Tambah Akun</h3>

                <div class="card-tools">
                  <a href="akun.php" class="btn btn-sm btn-primary">
                    <i class="fas fa-arrow-left"></i> Back
                  </a>
                </div>
                
              </div>
              
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class="form-group col-lg-6">
                        <label for="nama">Nama</label>
                        <input required type="text" id="nama" name="nama" class="form-control" placeholder="Nama...">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Username</label>
                        <input required type="text" id="username" name="username" class="form-control" placeholder="Username...">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input required type="email" id="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email...">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputPassword1">Password</label>
                        <input required type="password" id="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password..." minlength="6">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Level User</label>
                        <select id="level" name="level" class="form-control">
                          <option selected>Level user...</option>
                          <option value="1">Superadmin</option>
                          <option value="2">Admin</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input required type="file" class="custom-file-input" id="file" name="file" onchange="previewImg()" accept="image/*">
                            <label class="custom-file-label" for="file">Choose file...</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>

                        
                    </div>

                    <div class="col-lg-3"></div>
                    <div class="text-center col lg-6">
                        <img src="" alt="" class="img-thumbnail img-preview mt-2" width="100px">
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