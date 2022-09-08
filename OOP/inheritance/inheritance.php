<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#3e454c">
    <title>Inheritance</title>
</head>
<body>
<?php
require_once ('employee.php');
$ryan = new Employee('John', 'yang', 'developer');
echo "Full name: " . $ryan->getFirstname() . $ryan->getLastname() . ", position: " . $ryan->get_position();
?>
</body>
</html>
