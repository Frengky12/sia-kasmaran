<?php


include './skeleton/config/connect-db.php';
include './skeleton/config/controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
</html>


<?php 
$id = (int)$_GET['id'];
$id_akun = (int)$_GET['id_akun'];


if (hapus_informasi($id, $id_akun) > 0) {
    echo "<script>
        setTimeout( 
        Swal.fire({
            icon: 'success',
            text: 'Berita berhasil dihapus...'
            })
    , 3000);
            window.location.href = 'informasi.php';

    </script>";
} else {
    echo "<script>
        setTimeout( 
        Swal.fire({
                icon: 'error',
                text: 'Berita gagal dihapus...'
            })
    , 3000);
            window.location.href = 'berita.php';
    </script>";
}

?>
