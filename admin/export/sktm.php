<?php

require('../skeleton/config/main.php');
require('../vendor/setasign/fpdf/fpdf.php');

$id = (int)$_GET['id'];
$surat = query("SELECT s.*, ms.nama_surat FROM surat s LEFT JOIN ms_surat ms ON ms.id = s.id_jenis WHERE s.id = $id")[0];
$level_akses = (int)$_SESSION['level'];

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
</html>


<?php 
class PDF extends FPDF
{
    // Header
    function Header()
    {
        // Logo
        $this->Image('../public/image/img/Pemkab.png',10,5,25); // Ganti 'path/to/logo.png' dengan path logo Anda
        $this->SetFont('Arial','B',12);
        $this->Cell(0,7,'PEMERINTAH KABUPATEN MUSI BANYUASIN',0,1,'C');
        $this->Cell(0,7,'KECAMATAN BABAT TOMAN',0,1,'C');
        $this->Cell(0,7,'DESA KASMARAN',0,1,'C');
        $this->SetFont('Arial','',10);
        $this->Cell(0,7,'Alamat: Jalan Propinsi Sekayu - Mangunjaya Desa Kasmaran Kecamatan Babat Toman 30772',0,1,'C');
        // $this->Ln(3);
    }

    // Footer
    // function Footer()
    // {
    //     // Position at 1.5 cm from bottom
    //     $this->SetY(-15);
    //     // Arial italic 8
    //     $this->SetFont('Arial','I',8);
    //     // Page number
    //     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    // }

      // Function to add data in table format
      function AddData($label, $value) {
        $this->SetFont('Arial', '', 12);
        $this->Cell(50, 7, $label, 0, 0);
        $this->Cell(0, 7, ': ' . $value, 0, 1);
    }
}

// Instantiation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'SURAT KETERANGAN TIDAK MAMPU',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3,'NOMOR : '. $surat['id'] .' / 2009/I/' . date('Y'),0,1,'C');

// Add a line under the title
$pdf->Line(10, 37, 200, 37);
$pdf->Ln(10);

// Isi surat
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,7,'Yang bertanda tangan dibawah ini Kepala Desa Kasmaran, Kecamatan Babat Toman, Kabupaten Musi Banyuasin, menerangkan dengan sebenarnya, bahwa:');

$pdf->Ln(3);
$pdf->AddData('Nama', $surat['nama']);
$pdf->AddData('NIK', $surat['nik']);
$pdf->AddData('Jenis Kelamin', $surat == 'L' ? 'Laki-laki' : 'Perempuan');
$pdf->AddData('Tempat, Tanggal Lahir', $surat['tempat_lahir'] .','. $surat['tanggal_lahir']);
$pdf->AddData('Agama', $surat['agama']);
$pdf->AddData('Pekerjaan', $surat['pekerjaan'] == NULL ? '-' : $surat['pekerjaan']);
$pdf->AddData('Status Pernikahan', $surat['status'] == 'N' ? 'Menikah' : 'Belum Menikah');
$pdf->AddData('Alamat', $surat['alamat']);

$content = "
Nama tersebut diatas adalah benar warga Desa Kasmaran, Kecamatan Babat Toman, Kabupaten Musi Banyuasin. Berdasarkan keterangan yang ada pada kami benar bahwa yang bersangkutan tergolong keluarga yang tidak mampu.
Surat Keterangan ini dibuat untuk Beasiswa.
Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
";



// Set the locale to Indonesian
setlocale(LC_TIME, 'id_ID.UTF-8', 'Indonesian.utf8', 'id_ID.utf8');

$currentDate = strftime('%d %B %Y');
// MultiCell
$pdf->MultiCell(0,7,$content);

$pdf->Ln(10);
$pdf->SetX(132);
$pdf->Cell(0,5,'Kasmaran, ' . $currentDate,0,1,'L');
// Position the signature to the right
$pdf->SetX(120);
$pdf->Cell(0,10,'KEPALA DESA KASMARAN',0,1,'C');
$pdf->Ln(20);
$pdf->SetX(120);
$pdf->Cell(0,10,'FAHRUL ROZI, S.Pd',0,1,'C');

// Directory where you want to save the PDF
$savePath = '../public/pdf/';
$filename = 'SKTM-'. $surat['nik'] . '-' . uniqid() . '.pdf';


try {
    // Output the PDF to the specified directory
    $pdf->Output($savePath . $filename, 'F');

    global $db;
    $query = "UPDATE `surat` SET filesSurat = '$filename' WHERE id = $id";
    mysqli_query($db, $query);

    echo"<script>
            Swal.fire({
                title: 'Success!',
                text: 'Surat Berhasil Dibuat',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../detail-surat.php?id=$id';
                }
            });
          </script>";
} catch (Exception $e) {

    echo"<script>
            Swal.fire({
                title: 'Failed!',
                text: 'Surat Gagal Dibuat',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../detail-surat.php?id=$id';
                }
            });
          </script>";
}

?>
