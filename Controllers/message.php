<?php

/**
 * File name: message.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php controller for sending message through SendGrid.
 */

function ProcessEmail($name, $emailAddress, $contactNum, $details) {

    require 'vendor/autoload.php';

    $from = new SendGrid\Email(null, $emailAddress);
    $subject = "Email from CMS Contact";
    $to = new SendGrid\Email(null, "ya-ya-it@yandex.com");
    $mailInfo = "Name: " . $name . " \n Contact Number: " . $contactNum;
    $mailInfo .= "\n \n " . $details;
    $content = new SendGrid\Content("text/plain", $mailInfo);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $sg = new \SendGrid("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");
    $response = $sg->client->mail()->send()->post($mail);
    return $response->statusCode();
}
?>