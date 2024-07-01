<?php

require('../skeleton/config/main.php');
require('../vendor/setasign/fpdf/fpdf.php');

// Set locale to Indonesian
setlocale(LC_TIME, 'id_ID.UTF-8', 'Indonesian.utf8', 'id_ID.utf8');

// Get the current date in Indonesian format
$currentDate = strftime('%d %B %Y');


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
    // Page header
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

    // Page footer
    // function Footer()
    // {
    //     $this->SetY(-15);
    //     $this->SetFont('Arial','I',8);
    //     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    // }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'SURAT KETERANGAN BERDOMISILI',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3,'NOMOR : '. $surat['id'] .' / 2009/II/' . date('Y'),0,1,'C');

// Add a line under the title
$pdf->Line(10, 37, 200, 37);
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,5,'Yang bertanda tangan dibawah ini, Kepala Desa Kasmaran Kecamatan Babat Toman Kabupaten Musi Banyuasin Provinsi Sumatera Selatan, dengan ini menerangkan bahwa :',0,'L');
$pdf->Ln(5);

$data = [
    'Nama' => $surat['nama'],
    'No NIK' => $surat['nik'],
    'Jenis Kelamin' =>  $surat == 'L' ? 'Laki-laki' : 'Perempuan',
    'Tempat/Tanggal Lahir' => $surat['tempat_lahir'] .', '. $surat['tanggal_lahir'],
    'Agama ' => $surat['agama'],
    'Status Pernikahan' => $surat['status'] == 'N' ? 'Menikah' : 'Belum Menikah',
    'Pekerjaan' => $surat['pekerjaan'] == NULL ? '-' : $surat['pekerjaan'],
    'Alamat' => $surat['alamat']
];

foreach ($data as $key => $value) {
    $pdf->Cell(60,7,$key,0,0,'L');
    $pdf->Cell(5,7,':',0,0,'L');
    $pdf->MultiCell(0,7,$value,0,'L');
}

$pdf->Ln(7);
$pdf->MultiCell(0,7,'Nama tersebut diatas benar menetap / Berdomisili di '. $surat['alamat'] .' sampai dengan sekarang.',0,'L');
$pdf->Ln(7);
$pdf->MultiCell(0,7,'Demikianlah Surat Keterangan ini kami buat dengan sebenaranya untuk dapat dipergunakan sebagaimana mestinya.',0,'L');
$pdf->Ln(10);

$pdf->SetX(120);
$pdf->Cell(0,5,'Kasmaran,' . $currentDate ,0,1,'C');
// Position the signature to the right
$pdf->SetX(120);
$pdf->Cell(0,10,'Kepala Desa Kasmaran',0,1,'C');

$pdf->Ln(0);
// Add signature image
// $pdf->SetX(80);
// $pdf->Image('../public/image/img/signature.jpg', 143, $pdf->GetY(), 28); // Adjust the path and position accordingly
$pdf->Image('../public/image/img/signature.png', 142, $pdf->GetY(), 35); // Adjust the path and position accordingly
$pdf->Ln(30);

$pdf->SetX(120);
$pdf->Cell(0,10,'FAHRUL ROZI, S.Pd',0,1,'C');

// $pdf->Output();

$savePath = '../public/pdf/';
$filename = 'SKD-'. $surat['nik'] . '-' . uniqid() . '.pdf';

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

    echo $e->getMessage();
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
