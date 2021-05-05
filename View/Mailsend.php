<?php
$to_email = $_POST['email'];
$subject = $_POST['subject'];
$body = $_POST['body'];
$headers = "";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>