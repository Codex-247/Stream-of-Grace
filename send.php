<?php
// Load PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Get form values
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Create mail object
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com'; // Hostinger SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@streamofgracechapel.org'; // Your Hostinger email
    $mail->Password = '10DayAIChallenge@'; // Your Hostinger email password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email setup
    $mail->setFrom($email, $name); // From the form
    $mail->addAddress('info@streamofgracechapel.org'); // To your Hostinger inbox
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = "
        <h2>New Contact Form Message</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Subject:</strong> {$subject}</p>
        <p><strong>Message:</strong><br>{$message}</p>
    ";

    $mail->send();
    echo "Message sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>
