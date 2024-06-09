<?php 
$title = 'SK Kematian';
include 'skeleton/header.php';

$users = query("SELECT s.*, ms.nama_surat FROM surat s LEFT JOIN ms_surat ms ON ms.id = s.id_jenis WHERE s.id_jenis = 4");
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
                <table class="table table-responsive table-bordered table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th width="2%">No.</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis Surat</th>
                      <th>No HP</th>
                      <th>Email</th>
                      <th>Penyebab Kematian</th>
                      <th>Tanggal Pengajuan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($users as $user) : ?>
                      
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $user['nik']; ?></td>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $user['nama_surat']; ?></td>
                        <td><?= $user['no_hp']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['penyebab_kematian']; ?></td>
                        <td><?= date('d/m/Y h:i:s', strtotime($user['createdAt'])); ?><td>
                          <a class="btn btn-sm btn-success" href="edit-akun.php?id=<?= $user['id'] ?>">
                            <i class="fas fa-fw fa-check"></i>
                            Validasi
                          </a>
                          <button class="btn btn-sm btn-danger" name="hapus" onclick="onHapus(<?= $user['id'] ?>)">
                            <i class="fas fa-fw fa-times"></i>
                            Tolak
                          </button>
                        </td>
                      </tr>
                     <?php endforeach; ?>
                  </tbody>

                </table>
              </div>
            </div>

        </div>
      </section>
      <!-- /.content -->
    </div>

    
    <!-- /.content-wrapper -->

        <script>
        function onHapus(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "Yakin Akun Akan Dihapus ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
              console.log('resul', result);
              if (result.value) {
                console.log('lanjtttt');
                window.location.href = `hapus-akun.php?id=${id}`;
              }
            })
        }
</script>

<?php 
include 'skeleton/footer.php';
?>