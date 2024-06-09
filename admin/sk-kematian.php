<?php 
$title = 'SK Kematian';
include 'skeleton/header.php';

// $surat = query("SELECT s.*, ms.nama_surat FROM surat s LEFT JOIN ms_surat ms ON ms.id = s.id_jenis WHERE s.id_jenis = 4");
$level_akses = (int)$_SESSION['level'];
if ($level_akses == 1) {
  $surat = query("SELECT s.*, ms.nama_surat,
(CASE
 WHEN s.validatedAt IS NULL AND s.approvedAt IS NULL THEN 'Waiting Validated'
 WHEN s.validatedAt IS NOT NULL AND s.approvedAt IS NULL THEN 'Waiting Approved'
 WHEN s.validatedAt IS NOT NULL AND s.approvedAt IS NOT NULL THEN 'Selesai'
  WHEN s.rejectedAt IS NOT NULL THEN 'Ditolak'
END) AS status
FROM surat s LEFT JOIN ms_surat ms ON ms.id = s.id_jenis WHERE s.id_jenis = 4 AND s.validatedAt IS NOT NULL");
} else {

  $surat = query("SELECT s.*, ms.nama_surat,
(CASE
 WHEN s.validatedAt IS NULL AND s.approvedAt IS NULL THEN 'Waiting Validated'
 WHEN s.validatedAt IS NOT NULL AND s.approvedAt IS NULL THEN 'Waiting Approved'
 WHEN s.validatedAt IS NOT NULL AND s.approvedAt IS NOT NULL THEN 'Selesai'
  WHEN s.rejectedAt IS NOT NULL THEN 'Ditolak'
END) AS status
FROM surat s LEFT JOIN ms_surat ms ON ms.id = s.id_jenis WHERE s.id_jenis = 4");
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
                    <tr class="text-center">
                      <th width="2%">No.</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jenis Surat</th>
                      <th>No HP</th>
                      <th>Email</th>
                      <th>Penyebab Kematian</th>
                      <th>Status Pengajuan</th>
                      <th>Tanggal Pengajuan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                      
                  <?php if (count($surat) == 0) { ?>
                      <tr class="text-center">
                        <td  colspan="10"><b>Belum Ada Data</b></td>
                      </tr>
                    <?php }; ?>
                    <?php $no = 1 ?>
                    <?php foreach ($surat as $srt) : ?>
                      
                      <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $srt['nik']; ?></td>
                        <td><?= $srt['nama']; ?></td>
                        <td><?= $srt['nama_surat']; ?></td>
                        <td><?= $srt['no_hp']; ?></td>
                        <td><?= $srt['email']; ?></td>
                        <td><?= $srt['penyebab_kematian']; ?></td>
                        <td>
                          <span class="badge badge-info">
                            <?= $srt['status']; ?>
                          </span>
                        </td>
                        <td><?= date('d/m/Y h:i:s', strtotime($srt['createdAt'])); ?><td>
                          <a class="btn btn-sm btn-success" href="detail-surat.php?id=<?= $srt['id'] ?>">
                            <i class="fas fa-fw fa-check"></i>
                            <?= $level_akses == 1 ? 'Approve' : 'Validasi'; ?>
                          </a>
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