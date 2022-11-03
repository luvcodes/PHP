<?php
// The message
$msg = "Hello world!\nHello from PHP mail() in FIT2104 Lecture!";

// Send email
$mail = mail(
    "John Doe <johndoe@example.com>,Jane Doe <janedoe@example.com>",
    "Subject of Hello World email",
    $msg
);

// Display send status. See https://www.php.net/manual/en/function.mail.php for details
var_dump($mail);
