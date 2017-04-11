<?php
function ProcessEmail($name, $emailAddress, $contactNum, $details) {

    require 'vendor/autoload.php';

    $from = new SendGrid\Email(null, $emailAddress);
    $subject = "Email from Contact Form";
    $to = new SendGrid\Email(null, "tom.tsiliopoulos@gmail.com");
    $details .= "\n \nFull Name:" . $name . "\nContact Number: " . $contactNum;
    $content = new SendGrid\Content("text/plain", $details);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $sg = new \SendGrid("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");
    $response = $sg->client->mail()->send()->post($mail);
    return $response->statusCode();
}
?>