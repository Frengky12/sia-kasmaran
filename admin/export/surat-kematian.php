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
$pdf->Cell(0,10,'SURAT KETERANGAN KEMATIAN',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3,'NOMOR : '. $surat['id'] .' / 2009/IV/' . date('Y'),0,1,'C');

// Add a line under the title
$pdf->Line(10, 37, 200, 37);
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,5,'Yang bertanda tangan dibawah ini, Kepala Desa Kasmaran Kecamatan Babat Toman Kabupaten Musi Banyuasin menerangkan bahwa :',0,'L');
$pdf->Ln(5);

$data = [
    'Nama' => 'RUSNAWATI',
    'NIK' => '1606065201540002',
    'Jenis Kelamin' => 'Perempuan',
    'Tempat Tgl. Lahir' => 'Kasmaran, 12-10-1965',
    'Agama' => 'Islam',
    'Pekerjaan' => 'Pegawai Negeri Sipil (PNS)',
    'Alamat' => 'Dusun II Desa Kasmaran Kec. Babat Toman'
];

foreach ($data as $key => $value) {
    $pdf->Cell(60,7,$key,0,0,'L');
    $pdf->Cell(5,7,':',0,0,'L');
    $pdf->MultiCell(0,7,$value,0,'L');
}

$pdf->Ln(5);
$pdf->MultiCell(0,7,'Menerangkan dengan sesungguhnya bahwa benar nama tersebut diatas meninggal dunia pada :',0,'L');

$death_info = [
    'Hari' => 'Jumat',
    'Tanggal' => '12 Januari 2024',
    'Jam' => '15.35 WIB',
    'Tempat' => 'Dirumah',
    'Disebabkan karena' => 'Sakit'
];

foreach ($death_info as $key => $value) {
    $pdf->Cell(60,7,$key,0,0,'L');
    $pdf->Cell(5,7,':',0,0,'L');
    $pdf->MultiCell(0,7,$value,0,'L');
}

$pdf->Ln(5);
$pdf->MultiCell(0,5,'Demikianlah Surat Keterangan ini dibuat dengan sebenaranya untuk dapat dipergunakan sebagaimana mestinya.',0,'L');
$pdf->Ln(7);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'SAKSI-SAKSI',0,1,'L');
$pdf->SetFont('Arial','',12);

$witnesses = [
    'ROSYAF SHIDIQ, S.E. (Sekdes)' => '.................................',
    'AJIE FAHMI FADLI, S.Pd. (Anak Kandung)' => '.................................'
];

$i = 1;
foreach ($witnesses as $witness => $dots) {
    $pdf->Cell(10,7,$i.'.',0,0,'L');
    $pdf->Cell(85,7,$witness,0,0,'L');
    $pdf->Cell(5,7,':',0,0,'L');
    $pdf->Cell(0,7,$dots,0,1,'L');
    $i++;
}
$pdf->Ln(10);


$pdf->SetX(120);
$pdf->Cell(0,5,'Kasmaran, 21 Februari 2024',0,1,'C');
// Position the signature to the right
$pdf->SetX(120);
$pdf->Cell(0,10,'KEPALA DESA KASMARAN',0,1,'C');
$pdf->Ln(20);
$pdf->SetX(120);
$pdf->Cell(0,10,'FAHRUL ROZI, S.Pd',0,1,'C');

$pdf->Output();
?>
