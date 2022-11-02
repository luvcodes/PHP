<html>
<head>
    <title>Overriding</title>
</head>
<body>
<?php
require_once ('employee.php');
$ryan = new Employee('ryan', 'yang', 'tutor');
echo "Full name: " . $ryan->getFirstname() . $ryan->getLastname() . ", position: " . $ryan->get_position() . "\n";
?>
</body>
</html>
