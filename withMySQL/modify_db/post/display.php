<!DOCTYPE html>
<head>
<title>Display post </title>
</head>
<body>
<?php
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
?>
<table>
    <tr><td>Welcome, <?php echo $_POST["firstname"] ?></td></tr>
    <tr><td><?php echo "And your lastname is $_POST[lastname]" ?></td></tr>
    <tr><td><?php echo "$fname $lname";?></td></tr>

</table>
</body>
</html>
