<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('vendor/autoload.php'); // Adjust the path if necessary
require('skeleton/config/main.php');

use Dotenv\Dotenv;

// Memuat file .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$id = (int)$_GET['id'];
$surat = query("SELECT s.*, ms.nama_surat FROM surat s LEFT JOIN ms_surat ms ON ms.id = s.id_jenis WHERE s.id = $id")[0];
$level_akses = (int)$_SESSION['level'];

sendEmail($id, $surat);


function sendEmail($id, $data) {

    
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
</html>


<?php 
  
// Define the file path
$file_path = 'public/pdf/' . $data['filesSurat'];

// Check if the file path is resolved correctly
$resolved_path = realpath($file_path);

try {
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    // Server settings
    $mail->SMTPDebug = 0;                                  // Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'siakasmaran@gmail.com';                     //SMTP username
        $mail->Password   = $_ENV['MAIL_PASSWORD_UNIQUE'];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    // Recipients
        $mail->setFrom('siakasmaran@gmail.com', 'SIA-KASMARAN');
        $mail->addAddress($data['email'], 'User');     //Add a recipient
        

    // Attachments
    $mail->addAttachment($resolved_path);                   // Add attachment


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Feedback Pengajuan Layanan Adminsitrasi';
        $mail->Body    = 'Selamat Pengajuan Anda telah <b>Disetujui</b>, berikut lampiran File Anda. Terimakasih';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the email
    $mail->send();
    
    global $db;
    $query = "UPDATE `surat` SET sendAt = CURRENT_TIMESTAMP WHERE id = $id";
    mysqli_query($db, $query);


    echo"
    <script>
    Swal.fire({
    title: 'Success!',
    text: 'Email has been sent successfully.',
    icon: 'success',
    confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'detail-surat.php?id=$id';
        }
    });
    </script>
    ";

} catch (Exception $e) {

    echo "<script>
            Swal.fire({
                title: 'Failed!',
                text: 'Email has been sent failed.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'detail-surat.php?id=$id';
                }
            });
          </script>
    ";
}

}