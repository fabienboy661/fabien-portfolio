<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $subject = htmlspecialchars($_POST['subject']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "fabien01999@gmail.com"; // Ton email
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8";

    $email_subject = "Message from " . $name . " - " . $subject;
    $email_body = "
        <html>
        <body>
            <h2>You have received a new message from " . $name . "</h2>
            <p><strong>Name:</strong> " . $name . "</p>
            <p><strong>Address:</strong> " . $address . "</p>
            <p><strong>Subject:</strong> " . $subject . "</p>
            <p><strong>Email:</strong> " . $email . "</p>
            <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
        </body>
        </html>
    ";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='your-portfolio-page.html';</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
    }
}
?>
