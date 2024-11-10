<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer via Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize input
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $location = htmlspecialchars($_POST['location']);   
    $state = htmlspecialchars($_POST['state']);
    $country = htmlspecialchars($_POST['country']);
    $messageContent = htmlspecialchars($_POST['message']);


    // Email details
    // $to = 'support@aboin.app'; // Replace with your email address
    $to = 'support@aboin.app'; // Replace with your email address
    $subject = 'Contact Us Form Submission'; 

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true); 

    try {
        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.sendgrid.net';                       // Specify SendGrid SMTP server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'apikey';                           // Use 'apikey' as the username 
        $mail->Password = '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'; // Replace with your actual SendGrid API key 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption
        $mail->Port = 587;                                       // TCP port for TLS

        // Recipients
        $mail->setFrom('support@aboin.app', 'Aboin');   // Set From email and name 
        $mail->addAddress($to);                                // Add recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject; 

        // Email body
        $emailBody = "<html><body>";
        $emailBody .= "<h2>Contact Us Form Submission</h2>";
        $emailBody .= "<p><strong>Name:</strong> $name</p>";
        $emailBody .= "<p><strong>Email:</strong> $email</p>";
        $emailBody .= "<p><strong>Phone:</strong> $phone</p>";
        $emailBody .= "<p><strong>Location:</strong> $location</p>";
        $emailBody .= "<p><strong>State:</strong> $state</p>";
        $emailBody .= "<p><strong>Country:</strong> $country</p>";
        $emailBody .= "<p><strong>Message:</strong><br>$messageContent</p>";
        $emailBody .= "</body></html>";

        $mail->Body = $emailBody;
        $mail->AltBody = strip_tags($emailBody); // Fallback for plain-text emails 

        // Send email
        if ($mail->send()) {
            // Redirect to contact.html with success status
            header("Location: contact.html?status=success");
            exit(); // Ensure no further code is executed 
        } else {
            // Redirect to contact.html with failure status
            header("Location: contact.html?status=failure");
            exit(); // Ensure no further code is executed
        }
    } catch (Exception $e) {
        // Redirect to contact.html with exception status
        header("Location: contact.html?status=exception");
        exit(); // Ensure no further code is executed 
    }
}
