<?php
include 'connect-db.php';


// fungsi mengelola query
function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi limit batas karakter
function limit_kata($string, $word_limit)
{
    $word_limit = $word_limit; // batas karakter
    $cetak = substr($string, 0, $word_limit);
    return $cetak;
}

function tambah_akun($post)
{
    global $db;

    $name = $post['nama'];
    $username = $post['username'];
    $email = $post['email'];
    $password = $post['password'];
    $level = $post['level'];

    
    // fungsi hash atau enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    $file = upload_foto();
    if(!$file){
        return false ;
    }

    $query = "INSERT INTO `user`(`id`, `nama`, `email`, `username`, `password`, `level`, `foto`, `createdAt`, `lastLogin`, `deletedAt`) VALUES (null,'$name','$email','$username','$password','$level','$file',CURRENT_TIMESTAMP,null,null)";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// hapus akun
function hapus_akun($id_akun)
{
    global $db;

    $query = "UPDATE `user` SET deletedAt = CURRENT_TIMESTAMP WHERE id = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function edit_akun($post)
{
    global $db;

    $id = $post['id'];
    $name = $post['nama'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];

    // fungsi hash atau enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    if ($_FILES['file']['error'] == 4) {
        $file = $post['fotoLama'];
    } else {
        $file = upload_foto();
        if(!$file){
            return false ;
        }
    }

    $query = "UPDATE user SET nama = '$name', username = '$username', password = '$password', level = '$level',foto = '$file' WHERE id = $id";


    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_visi_misi($post)
{
    global $db;

    $id = $post['id'];
    $visi = $post['visi'];
    $misi = $post['misi'];
    $updatedBy = $post['updatedBy'];


    $query = "UPDATE visi_misi SET visi = '$visi', misi = '$misi', updatedAt = CURRENT_TIMESTAMP, updatedBy = '$updatedBy' WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_kontak($post)
{
    global $db;

    $id = $post['id'];
    $email = $post['email'];
    $alamat = $post['alamat'];
    $wa = $post['wa'];
    $ig = $post['ig'];
    $fb = $post['fb'];
    $updatedBy = $post['updatedBy'];


    $query = "UPDATE kontak SET email = '$email', alamat = '$alamat', wa = '$wa', ig = '$ig', fb = '$fb', updatedAt = CURRENT_TIMESTAMP, updatedBy = '$updatedBy' WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_sejarah($post)
{
    
    global $db;

    $id = $post['id'];
    $judul = $post['judul'];
    $isi = $post['isi'];
    $updatedBy = $post['updatedBy'];

    if ($_FILES['file']['error'] == 4) {
        $file = $post['fotoLama'];
    } else {
        $file = upload_foto_sejarah();
        if(!$file){
            return false ;
        }
    }


    $query = "UPDATE sejarah SET judul = '$judul', isi = '$isi', picture = '$file', updatedAt = CURRENT_TIMESTAMP, updatedBy = '$updatedBy' WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function tambah_informasi($post)
{
    global $db;

    $judul = $post['judul'];
    $isi = $post['isi'];
    $createdBy = $post['createdBy'];


    $file = upload_foto_berita();
    if(!$file){
        return false ;
    }

    $query = "INSERT INTO `informasi` (`id`, `judul`, `isi`, `picture`, `createdAt`, `createdBy`, `deletedAt`, `deletedBy`) VALUES (null,'$judul','$isi','$file',CURRENT_TIMESTAMP, '$createdBy',null,null)";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function edit_informasi($post)
{
    global $db;

    $id = $post['id'];
    $judul = $post['judul'];
    $isi = $post['isi'];
    $createdBy = $post['createdBy'];



    if ($_FILES['file']['error'] == 4) {
        $file = $post['fotoLama'];
    } else {
        $file = upload_foto_berita();
        if(!$file){
            return false ;
        }
    }

    $query = "UPDATE informasi SET judul = '$judul', isi = '$isi', picture = '$file'  WHERE id = $id";


    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function hapus_informasi($id, $id_akun)
{
    global $db;

    $query = "UPDATE `informasi` SET deletedAt = CURRENT_TIMESTAMP, deletedBy = '$id_akun' WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function potongBerita($berita, $panjangMax = 100) {
    if (strlen($berita) > $panjangMax) {
        $potonganBerita = substr($berita, 0, $panjangMax) . '...';
        return $potonganBerita;
    } else {
        return $berita;
    }
}

function insert_surat_sktm($post) 
{
    global $db;

    $id_jenis = $post['id_surat'];
    $nama = $post['nama'];
    $email = $post['email'];
    $no_hp = $post['no_hp'];
    $tempat_lahir = $post['tempat_lahir'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $pekerjaan = $post['pekerjaan'];
    $agama = $post['agama'];
    $jenKel = $post['jenKel'];
    $alamat = $post['alamat'];
    $status = $post['status'];

    $file = upload_file_surat('sktm');
    if(!$file){
        return false ;
    };


    $query = "INSERT INTO `surat` (`id_jenis`, `nama`, `email`, `file`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `agama`, `jenKel`, `alamat`,`status`, `createdAt`) VALUES ('$id_jenis','$nama', '$email', '$file', '$no_hp', '$tempat_lahir', '$tanggal_lahir', '$pekerjaan', '$agama', '$jenKel', '$alamat','$status', CURRENT_TIMESTAMP)";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


function insert_surat_domisili($post) 
{
    global $db;

    $id_jenis = $post['id_surat'];
    $nama = $post['nama'];
    $email = $post['email'];
    $no_hp = $post['no_hp'];
    $tempat_lahir = $post['tempat_lahir'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $pekerjaan = $post['pekerjaan'];
    $agama = $post['agama'];
    $jenKel = $post['jenKel'];
    $alamat = $post['alamat'];
    $status = $post['status'];

    $file = upload_file_surat('skd');
    if(!$file){
        return false ;
    };


    $query = "INSERT INTO `surat` (`id_jenis`, `nama`, `email`, `file`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `agama`, `jenKel`, `alamat`,`status`, `createdAt`) VALUES ('$id_jenis','$nama', '$email', '$file', '$no_hp', '$tempat_lahir', '$tanggal_lahir', '$pekerjaan', '$agama', '$jenKel', '$alamat','$status', CURRENT_TIMESTAMP)";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


function insert_surat_usaha($post) 
{
    global $db;

    $id_jenis = $post['id_surat'];
    $nama = $post['nama'];
    $email = $post['email'];
    $no_hp = $post['no_hp'];
    $tempat_lahir = $post['tempat_lahir'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $pekerjaan = $post['pekerjaan'];
    $agama = $post['agama'];
    $jenKel = $post['jenKel'];
    $alamat = $post['alamat'];
    $status = $post['status'];
    $keperluan_surat = $post['keperluan_surat'];
    $nama_usaha = $post['nama_usaha'];
    $alamat_usaha = $post['alamat_usaha'];

    $file = upload_file_surat('sku');
    if(!$file){
        return false ;
    };


    $query = "INSERT INTO `surat` (`id_jenis`, `nama`, `email`, `file`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `agama`, `jenKel`, `alamat`,`status`,`keperluan_surat`,`nama_usaha`,`alamat_usaha`,`createdAt`)
    VALUES 
    ('$id_jenis','$nama', '$email', '$file', '$no_hp', '$tempat_lahir', '$tanggal_lahir', '$pekerjaan', '$agama', '$jenKel', '$alamat','$status','$keperluan_surat','$nama_usaha','$alamat_usaha', CURRENT_TIMESTAMP)";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


function insert_surat_kematian($post) 
{
    global $db;

    $id_jenis = $post['id_surat'];
    $nama = $post['nama'];
    $email = $post['email'];
    $no_hp = $post['no_hp'];
    $tempat_lahir = $post['tempat_lahir'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $pekerjaan = $post['pekerjaan'];
    $agama = $post['agama'];
    $jenKel = $post['jenKel'];
    $alamat = $post['alamat'];
    $status = $post['status'];
    $penyebab_kematian = $post['penyebab_kematian'];
    $tanggal_kematian = $post['tanggal_kematian'];
    $lokasi_kematian = $post['lokasi_kematian'];

    $file = upload_file_surat('skk');
    if(!$file){
        return false ;
    };


    $query = "INSERT INTO `surat` (`id_jenis`, `nama`, `email`, `file`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `agama`, `jenKel`, `alamat`,`status`,`penyebab_kematian`,`tanggal_kematian`,`lokasi_kematian`,`createdAt`)
    VALUES 
    ('$id_jenis','$nama', '$email', '$file', '$no_hp', '$tempat_lahir', '$tanggal_lahir', '$pekerjaan', '$agama', '$jenKel', '$alamat','$status','$penyebab_kematian','$tanggal_kematian','$lokasi_kematian', CURRENT_TIMESTAMP)";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

function insert_surat_nikah($post) 
{
    global $db;

    $id_jenis = $post['id_surat'];
    $nama = $post['nama'];
    $email = $post['email'];
    $no_hp = $post['no_hp'];
    $tempat_lahir = $post['tempat_lahir'];
    $tanggal_lahir = $post['tanggal_lahir'];
    $pekerjaan = $post['pekerjaan'];
    $agama = $post['agama'];
    $jenKel = $post['jenKel'];
    $alamat = $post['alamat'];
    $status = $post['status'];
    $nama_ortu_lk = $post['nama_ortu_lk'];
    $nama_ortu_pr = $post['nama_ortu_pr'];

    $file = upload_file_surat('spn');
    if(!$file){
        return false ;
    };


    $query = "INSERT INTO `surat` (`id_jenis`, `nama`, `email`, `file`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `agama`, `jenKel`, `alamat`,`status`,`nama_ortu_lk`,`nama_ortu_pr`,`createdAt`)
    VALUES 
    ('$id_jenis','$nama', '$email', '$file', '$no_hp', '$tempat_lahir', '$tanggal_lahir', '$pekerjaan', '$agama', '$jenKel', '$alamat','$status','$nama_ortu_lk','$nama_ortu_pr', CURRENT_TIMESTAMP)";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


function upload_foto()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];


    // cek format file yang di upload
    $ekstensiFileValid = ['pdf','jpg', 'png', 'jpeg'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if(!in_array($ekstensiFile, $ekstensiFileValid)){
        echo "<script> 
                alert('File Yang Anda Upload Salah !'); 
                document.location.href = 'tambah-administrator.php' ;
            </script>";
        die();
    }

    // jika ukuran melampaui batas maksimal
    if ($ukuranFile > 2048000) { // batas 2 MB
        echo "<script>
                alert('Ukuran File Terlalu Besar');
                document.location.href = 'tambah-administrator.php';
            </script>";
        die();
    }

    // ubah nama file yang di upload
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiFile;

    // memindahkan data yg di upload ke folder file
    move_uploaded_file($tmpName, './public/image/foto-profil/' . $namaFilebaru);
    return $namaFilebaru;
}


function upload_foto_sejarah()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];


    // cek format file yang di upload
    $ekstensiFileValid = ['pdf','jpg', 'png', 'jpeg'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if(!in_array($ekstensiFile, $ekstensiFileValid)){
        echo "<script> 
                alert('File Yang Anda Upload Salah !'); 
                console.log('Masuk A');
                document.location.href = 'sejarah.php' ;
            </script>";
        die();
    }

    // jika ukuran melampaui batas maksimal
    if ($ukuranFile > 2048000) { // batas 2 MB
        echo "<script>
                alert('Ukuran File Terlalu Besar');
                document.location.href = 'sejarah.php';
            </script>";
        die();
    }

    // ubah nama file yang di upload
    $namaFilebaru = 'Sejarah-' . uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiFile;

    // memindahkan data yg di upload ke folder file
    move_uploaded_file($tmpName, './public/image/img/' . $namaFilebaru);
    return $namaFilebaru;
}


function upload_foto_berita()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];


    // cek format file yang di upload
    $ekstensiFileValid = ['pdf','jpg', 'png', 'jpeg'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if(!in_array($ekstensiFile, $ekstensiFileValid)){
        echo "<script> 
                alert('File Yang Anda Upload Salah !'); 
                console.log('Masuk A');
                document.location.href = 'sejarah.php' ;
            </script>";
        die();
    }

    // jika ukuran melampaui batas maksimal
    if ($ukuranFile > 2048000) { // batas 2 MB
        echo "<script>
                alert('Ukuran File Terlalu Besar');
                document.location.href = 'sejarah.php';
            </script>";
        die();
    }

    // ubah nama file yang di upload
    $namaFilebaru = 'Berita-' . uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiFile;

    // memindahkan data yg di upload ke folder file
    move_uploaded_file($tmpName, './public/image/berita/' . $namaFilebaru);
    return $namaFilebaru;
}


function upload_file_surat($type)
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];


    // cek format file yang di upload
    $ekstensiFileValid = ['pdf','jpg', 'png', 'jpeg'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if(!in_array($ekstensiFile, $ekstensiFileValid)){
        echo "<script> 
                alert('File Yang Anda Upload Salah !'); 
                console.log('Masuk A');
                document.location.href = 'sejarah.php' ;
            </script>";
        die();
    }

    // jika ukuran melampaui batas maksimal
    if ($ukuranFile > 2048000) { // batas 2 MB
        echo "<script>
                alert('Ukuran File Terlalu Besar');
                document.location.href = 'sejarah.php';
            </script>";
        die();
    }

    // ubah nama file yang di upload
    $namaFilebaru = $type . '-' . uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiFile;

    // memindahkan data yg di upload ke folder file
    move_uploaded_file($tmpName, './admin/public/surat/' . $namaFilebaru);
    return $namaFilebaru;
}
