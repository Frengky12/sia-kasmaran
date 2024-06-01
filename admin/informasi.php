<?php 

$title = 'Informasi';
include 'skeleton/header.php';

$informasi = query("SELECT i.*, u.nama FROM informasi i LEFT JOIN user u ON u.id = i.createdBy WHERE 1=1 AND i.deletedAt IS NULL");

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
                <h3 class="card-title">Informasi</h3>

                <div class="card-tools">
                  <a class="btn btn-sm btn-primary" href="tambah-informasi.php">
                     Tambah Berita <i class="fas fa-plus"></i>
                  </a>
                </div>
              </div>
              
              <div class="card-body">
                <table class="table table-responsive table-bordered table-hover text-nowrap">
                  <thead>
                    <tr class="text-center">
                      <th width="2%">No.</th>
                      <th>Judul</th>
                      <th>Isi</th>
                      <th>Foto</th>
                      <th>Pembuat</th>
                      <th>Tanggal Publish</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1 ?>
                    <?php foreach($informasi as $berita) : ?>
                      <tr>
                        
                        <td><?= $no++ ?></td>
                        <td><?= $berita['judul']; ?></td>
                        <td><?= potongBerita($berita['isi']); ?></td>
                        <td>
                          <img src="./public/image/berita/<?= $berita['picture']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">
                        </td>
                        <td><?= $berita['nama']; ?></td>
                        <td>
                          <?= date('d/m/Y h:i', strtotime($berita['createdAt'])); ?>
                        </td>
                        <td>
                          <a class="btn btn-sm btn-success" href="edit-informasi.php?id=<?= $berita['id']; ?>">
                              <i class="fas fa-fw fa-edit"></i>
                              Edit
                            </a>
                            <button class="btn btn-sm btn-danger" name="hapus" onclick="onHapus(<?= $berita['id'] ?>, <?= $_SESSION['id']; ?>)">
                              <i class="fas fa-fw fa-trash-alt"></i>
                              Hapus
                            </button>
                        </td>
                      </tr>
                    <?php endforeach ?>

                  </tbody>

                </table>
              </div>

            </div>

        
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        function onHapus(id, id_akun){
            Swal.fire({
                title: 'Are you sure?',
                text: "Yakin Akun Akan Dihapus ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
              if (result.value) {
                window.location.href = `hapus-informasi.php?id=${id}&id_akun=${id_akun}`;
              }
            })
        }
</script>



<?php 

include 'skeleton/footer.php';
?>