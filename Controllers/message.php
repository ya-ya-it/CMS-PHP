<?php
function ProcessEmail($name, $emailAddress, $contactNum, $details) {

    require 'vendor/autoload.php';

    $from = new SendGrid\Email(null, $emailAddress);
    $subject = "Email from CMS Contact";
    $to = new SendGrid\Email(null, "ya-ya-it@yandex.com");
    $mailInfo = "Name: " . $name . "\n \nContact Number: " . $contactNum;
    $mailInfo .= "\n \n " . $details;
    $content = new SendGrid\Content("text/plain", $mailInfo);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $sg = new \SendGrid("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");
    $response = $sg->client->mail()->send()->post($mail);
    return $response->statusCode();
}
?>