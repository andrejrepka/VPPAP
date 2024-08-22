<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Email details
    $to = "andrej.repka4@gmail.com";
    $subject = "New Form Submission";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<h1>Thank you!</h1>";
        echo "<p>Your message has been sent.</p>";
    } else {
        echo "<h1>Error</h1>";
        echo "<p>There was an error sending your message. Please try again later.</p>";
    }
} else {
    echo "<h1>Form Not Submitted</h1>";
    echo "<p>There was an error with the submission.</p>";
}
?>