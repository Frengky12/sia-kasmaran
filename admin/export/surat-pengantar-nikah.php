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

$no_surat = $surat['id'];
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
        global $no_surat;
        // Logo
        // $this->Image('logo.png',10,6,10); // Make sure to place 'logo.png' in the same directory or provide a correct path
        $this->SetFont('Arial','B',12);
        $this->Cell(0,4,'KEPUTUSAN DIREKTUR JENDRAL BIMBINGAN MASYARAKAT ISLAM',0,1,'C');
        $this->Cell(0,4,'NOMOR 471 TAHUN 2020',0,1,'C');
        $this->Cell(0,4,'TENTANG',0,1,'C');
        $this->Cell(0,4,'PETUNJUK TEKNIS PELAKSANAAN PENCATATAN PERNIKAHAN',0,1,'C');
        $this->Ln(3);
        $this->SetFont('Arial','B',14);
        $this->Cell(0,4,'FORMULIR PENGANTAR NIKAH',0,1,'C');
        $this->Ln(3);

      // Aligned Key-Value Pairs
      $this->SetFont('Arial','',12);
      $this->Cell(70,5,'KANTOR DESA/KELURAHAN',0,0,'L');
      $this->Cell(5,5,':',0,0,'L');
      $this->Cell(0,5,'KASMARAN',0,1,'L');
      $this->Cell(70,5,'KECAMATAN',0,0,'L');
      $this->Cell(5,5,':',0,0,'L');
      $this->Cell(0,5,'BABAT TOMAN',0,1,'L');
      $this->Cell(70,5,'KABUPATEN/KOTA',0,0,'L');
      $this->Cell(5,5,':',0,0,'L');
      $this->Cell(0,5,'MUSI BANYUASIN',0,1,'L');
      $this->Ln(5);
        
        $this->SetFont('Arial','B',14);
        $this->Cell(0,5,'PENGANTAR NIKAH',0,1,'C');
         // Underline
         $this->Line(80, $this->GetY(), 132, $this->GetY());
        $this->SetFont('Arial','',12);
        $this->Cell(0,5,'NOMOR : '. $no_surat . ' / 2009/V/' . date('Y'),0,1,'C');
        $this->Ln(10);
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
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->MultiCell(0,1,'Yang bertanda tangan di bawah ini menjelaskan dengan sesungguhnya bahwa :',0,'L');
$pdf->Ln(5);

$data = [
    'Nama Lengkap dan Alias' => $surat['nama'],
    'Binti' => $surat['nama_ortu_lk'],
    'Nomor induk kependudukan' => $surat['nik'],
    'Tempat dan Tanggal Lahir' => $surat['tempat_lahir'] .', '. $surat['tanggal_lahir'],
    'Kewarganegaraan' => 'Indonesia',
    'Agama' => $surat['agama'],
    'Pekerjaan' => $surat['pekerjaan'],
    'Alamat' => $surat['alamat'],
    'Status Menikah' => $surat['status'] == 'N' ? 'Menikah' : 'Belum Menikah'
];

foreach ($data as $key => $value) {
    $pdf->Cell(60,1,$key,0,0,'L');
    $pdf->Cell(5,1,':',0,0,'L');
    $pdf->Cell(0,1,$value,0,1,'L');
    $pdf->Ln(3); // Ensure 5 units spacing between each line
}

$pdf->Ln(3); // Ensure 5 units spacing between each line
$pdf->MultiCell(0,1,'Adalah benar Anak Dari Pernikahan Seorang Pria:',0,'L');
$pdf->Ln(5);

$data_pria = [
    'Nama Lengkap' => $surat['nama_ortu_lk'],
    'NIK' => '-',
    'Tempat dan Tanggal Lahir' => '-',
    'Jenis Kelamin' => '-',
    'Kewarganegaraan' => 'Indonesia',
    'Agama' => 'Islam',
    'Pekerjaan' => '-',
    'Alamat' => $surat['alamat']
];

foreach ($data_pria as $key => $value) {
    $pdf->Cell(60,1,$key,0,0,'L');
    $pdf->Cell(5,1,':',0,0,'L');
    $pdf->Cell(0,1,$value,0,1,'L');
    $pdf->Ln(3); // Ensure 5 units spacing between each line
}

$pdf->Ln(3); // Ensure 5 units spacing between each line
$pdf->MultiCell(0,1,'Dengan Seorang Wanita:',0,'L');
$pdf->Ln(5);

$data_wanita = [
    'Nama Lengkap' => $surat['nama_ortu_pr'],
    'NIK' => '',
    'Tempat dan Tanggal Lahir' => '-',
    'Jenis Kelamin' => '-',
    'Kewarganegaraan' => 'Indonesia',
    'Agama' => 'Islam',
    'Pekerjaan' => '-',
    'Alamat' => $surat['alamat']
];

foreach ($data_wanita as $key => $value) {
    $pdf->Cell(60,1,$key,0,0,'L');
    $pdf->Cell(5,1,':',0,0,'L');
    $pdf->Cell(0,1,$value,0,1,'L');
    $pdf->Ln(3); // Ensure 5 units spacing between each line
}

$pdf->Ln(3); // Ensure 5 units spacing between each line
$pdf->MultiCell(0,5,'Demikianlah surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan sebagaimana mestinya.',0,'L');
$pdf->Ln(5);

$pdf->SetX(120);
$pdf->Cell(0,5,'Kasmaran, ' . $currentDate,0,1,'C');
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
$filename = 'SKPN-'. $surat['nik'] . '-' . uniqid() . '.pdf';

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
