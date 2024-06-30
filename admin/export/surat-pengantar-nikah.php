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
        // $this->Image('logo.png',10,6,10); // Make sure to place 'logo.png' in the same directory or provide a correct path
        $this->SetFont('Arial','B',12);
        $this->Cell(0,4,'KEPUTUSAN DIREKTUR JENDRAL BIMBINGAN MASYARAKAT ISLAM',0,1,'C');
        $this->Cell(0,4,'NOMOR 471 TAHUN 2020',0,1,'C');
        $this->Cell(0,4,'TENTANG',0,1,'C');
        $this->Cell(0,4,'PETUNJUK TEKNIS PELAKSANAAN PENCATATAN PERNIKAHAN',0,1,'C');
        $this->Ln(2);
        $this->SetFont('Arial','B',14);
        $this->Cell(0,4,'FORMULIR PENGANTAR NIKAH',0,1,'C');


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
         $this->Line(80, $this->GetY(), 110, $this->GetY());
        $this->SetFont('Arial','',12);
        $this->Cell(0,5,'NOMOR : '. 1 . ' / 2009/V/' . date('Y'),0,1,'C');
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
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->MultiCell(0,1,'Yang bertanda tangan di bawah ini menjelaskan dengan sesungguhnya bahwa :',0,'L');
$pdf->Ln(5);

$data = [
    'Nama Lengkap dan Alias' => 'BELA SAPNA ANGGUN SARI',
    'Binti' => 'AZWAR',
    'Nomor induk kependudukan' => '1606066110990002',
    'Tempat dan Tanggal Lahir' => 'Kasmaran, 11-12-1999',
    'Kewarganegaraan' => 'Indonesia',
    'Agama' => 'Islam',
    'Pekerjaan' => 'Wiraswasta',
    'Alamat' => 'Dusun II Desa Kasmaran Kec. Babat Toman Kab. Muba',
    'Status Perkawinan' => 'PERAWAN'
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
    'Nama Lengkap' => 'AZWAR',
    'NIK' => '1606060107600026',
    'Tempat dan Tanggal Lahir' => 'Karang Waru, 01-07-1960',
    'Jenis Kelamin' => 'Laki-laki',
    'Kewarganegaraan' => 'Indonesia',
    'Agama' => 'Islam',
    'Pekerjaan' => 'Karyawan Swasta',
    'Alamat' => 'Dusun II Desa Kasmaran Kec. Babat Toman Kab. Muba'
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
    'Nama Lengkap' => 'HOTAMA (Almh)',
    'NIK' => '',
    'Tempat dan Tanggal Lahir' => '',
    'Jenis Kelamin' => '',
    'Kewarganegaraan' => '',
    'Agama' => 'Islam',
    'Pekerjaan' => '',
    'Alamat' => ''
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
$pdf->Cell(0,5,'Kasmaran, 21 Februari 2024',0,1,'C');
// Position the signature to the right
$pdf->SetX(120);
$pdf->Cell(0,10,'KEPALA DESA KASMARAN',0,1,'C');
$pdf->Ln(20);
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



    echo "
    <script>
            Swal.fire({
                title: 'Success!',
                text: 'Email has been sent successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../detail-surat.php?id=$id';
                }
            });
          </script>
    ";

    return true;
} catch (Exception $e) {

    echo "
    <script>
            Swal.fire({
                title: 'Failed!',
                text: 'Email has been sent failed.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../detail-surat.php?id=$id';
                }
            });
          </script>
    ";
    return false;
}

?>
