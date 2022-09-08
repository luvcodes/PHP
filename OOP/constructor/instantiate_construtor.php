<html>
<head>
    <title>Constructor</title>
</head>
<body>
<?php
require_once ('person.php');
$ryan = new Person('John', 'Smith');
echo "Full Name: " . $ryan->getFirstname() . " " .$ryan->getLastname();
?>
</body>
</html>
