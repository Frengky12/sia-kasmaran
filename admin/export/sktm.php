<?php
require('../vendor/setasign/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Header
    function Header()
    {
        // Logo
        $this->Image('../public/image/img/Pemkab.png',10,5,25); // Ganti 'path/to/logo.png' dengan path logo Anda
        // Arial bold 12
        $this->SetFont('Arial','B',10);
        // Title
        $this->Cell(0,5,'PEMERINTAH KABUPATEN MUSI BANYUASIN',0,1,'C');
        $this->Cell(0,5,'KECAMATAN BABAT TOMAN',0,1,'C');
        $this->Cell(0,5,'DESA KASMARAN',0,1,'C');
        $this->SetFont('Arial','',10);
        $this->Cell(0,5,'Jl. Provinsi - Kode Pos 00000',0,1,'C');
        $this->Cell(0,5,'Website: http://sia-kasmaran.co.id - Email: .................',0,1,'C');
        // Line break
        $this->Ln(2);
        // Garis pembatas
        $this->Line(10, 40, 200, 40);
        // Line break
        $this->Ln(7);
        // Arial bold 10
        $this->SetFont('Arial','B',10);
        $this->Cell(0,5,'SURAT KETERANGAN TIDAK MAMPU',0,1,'C');
        // Arial 10
        $this->SetFont('Arial','',10);
        $this->Cell(0,5,'Nomor: 204/0015/TR/I/2021',0,1,'C');
        // Line break
        $this->Ln(5);
    }

    // Footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

      // Function to add data in table format
      function AddData($label, $value) {
        $this->SetFont('Arial', '', 10);
        $this->Cell(50, 7, $label, 0, 0);
        $this->Cell(0, 7, ': ' . $value, 0, 1);
    }
}

// Instantiation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

// Set right margin
$pdf->SetRightMargin(10);

// Isi surat
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,7,'Yang bertanda tangan dibawah ini Kepala Desa Kasmaran, Kecamatan Babat Toman, Kabupaten Musi Banyuasin, menerangkan dengan sebenarnya, bahwa:');

$pdf->Ln(3);
$pdf->AddData('Nama', 'ANGGRAINI AGUSTIN SAPUTRI');
$pdf->AddData('NIK', '2021202120212021');
$pdf->AddData('Jenis Kelamin', 'PEREMPUAN');
$pdf->AddData('Tempat, Tanggal Lahir', 'KASMARAN, 10-08-2003');
$pdf->AddData('Warganegara / Agama', 'WNI / ISLAM');
$pdf->AddData('Pekerjaan', '-');
$pdf->AddData('Status Pernikahan', 'BELUM KAWIN');
$pdf->AddData('Alamat', 'RT. RW. Desa Kasmaran, Kecamatan Babat Toman Musi Banyuasin');

$content = "
Nama tersebut diatas adalah benar warga Desa Kasmaran, Kecamatan Babat Toman, Kabupaten Musi Banyuasin. Berdasarkan keterangan yang ada pada kami benar bahwa yang bersangkutan tergolong keluarga yang tidak mampu.
Surat Keterangan ini dibuat untuk Beasiswa.
Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
";

// MultiCell
$pdf->MultiCell(0,7,$content);

// Tanda tangan
$pdf->Ln(10);
$pdf->Cell(0,10,'MENGETAHUI,',0,1,'R');
// $pdf->Cell(0,10,'Kepala Desa Kasmaran',0,1,'L');
$pdf->Cell(0,10,'Kasmaran, 14 Juni 2024',0,1,'R');
$pdf->Cell(0,10,'kepala Desa Kasmaran',0,1,'R');
$pdf->Ln(20);
// $pdf->Cell(0,10,'_____________________',0,0,'L');
$pdf->Cell(0,10,'Fahrul Rozi',0,1,'R');

// Directory where you want to save the PDF
$savePath = '../public/pdf/';
$filename = uniqid().'.pdf';

// Output the PDF to the specified directory
$pdf->Output($savePath . $filename, 'F');
// $pdf->Output();

echo "PDF has been saved to " . $savePath . $filename;
?>
