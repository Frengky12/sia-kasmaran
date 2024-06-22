<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php'); // Adjust the path if necessary


function sendEmail($file) {
  
// Define the file path
$file_path = 'pdf/' . $file;

// Check if the file path is resolved correctly
$resolved_path = realpath($file_path);

if (!$resolved_path) {
    die("Failed to resolve file path: $file_path");
} else {
    echo "Resolved file path: $resolved_path<br>";
}

// Check if the file exists
if (!file_exists($resolved_path)) {
    die("File does not exist: $resolved_path");
} else {
    echo "File exists: $resolved_path<br>";
}

// Check if the file is readable
if (!is_readable($resolved_path)) {
    die("File is not readable: $resolved_path");
} else {
    echo "File is readable: $resolved_path<br>";
}

// Output file permissions for debugging
$permissions = substr(sprintf('%o', fileperms($resolved_path)), -4);
echo "File permissions: $permissions<br>";

try {
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    // Server settings
    $mail->SMTPDebug = 2;                                  // Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'siakasmaran@gmail.com';                     //SMTP username
        $mail->Password   = 'cuea tlia toop nmhc';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    // Recipients
        $mail->setFrom('siakasmaran@gmail.com', 'SIA-KASMARAN');
        $mail->addAddress('frengkysky645@gmail.com', 'User');     //Add a recipient

    // Attachments
    $mail->addAttachment($resolved_path);                   // Add attachment


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Feedback Pengajuan Layanan Adminsitrasi';
        $mail->Body    = 'Selamat Pengajuan Anda telah <b>Disetujui</b>, berikut lampiran File Anda. Terimakasih';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}