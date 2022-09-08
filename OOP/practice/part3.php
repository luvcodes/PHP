<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once('student.php');

// Create object
$ryan = new Student("Ryan", "Yang", "38 college walk", "a@gmail.com", 123456789, "2022/2/3", "Yes");
$ryan->set_firstname("Mike");
var_dump($ryan);
echo $ryan;
?>
</body>
</html>
