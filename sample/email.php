<?php
/*
using xampp
 
setting on php.ini
[mail function]
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
SMTP=smtp.gmail.com
smtp_port=587

[sendmail]
smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=franktan98@gmail.com
auth_password=xxxa1234zxx
force_sender=franktan98@gmail.com

https://www.google.com/settings/security/lesssecureapps
 turn on the less security selection 
 * 
by following those step now successfull sending email via gamil

have to test up how many email sending per second 
 */

$to = "franktan98@yahoo.com";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";
$headers = "From: franktan.debug@gmail.com" . "\r\n";
if (mail($to, $subject, $body, $headers)) {
    echo ("Message successfully sent!");
} else {
    echo ("Message delivery failed...");
}
    