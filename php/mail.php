<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = 'bankers.swajan@gmail.com'; // Replace with your email address
        $subject = 'New Subscription';
        $message = 'You have a new subscription from: ' . $email;
        $headers = 'From: sachin.sanchaniya@gmail.com' . "\r\n" .
            'Reply-To: sachin.sanchaniya@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            http_response_code(200);
            echo 'Email sent successfully';
        } else {
            http_response_code(500);
            echo 'Failed to send email';
        }
    } else {
        http_response_code(400);
        echo 'Invalid email address';
    }
} else {
    http_response_code(405);
    echo 'Method not allowed';
}
?>
