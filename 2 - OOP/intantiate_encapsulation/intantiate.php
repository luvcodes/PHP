<html>
<head>
<title>Instantiate</title>
</head>
<body>
<?php
require_once ('person.php');

$ryan = new Person();
$ryan->set_firstname('ryan');
$ryan->set_lastname('yang');
echo "Full name: " . $ryan->get_firstname() . " " . $ryan->get_lastname();
?>
</body>
</html>
