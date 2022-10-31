<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
?>

<table border="0">
    <tr><td>Hello, <?= $_POST["fname"]; ?></td></tr>
    <tr><td>Fullname: <?= $_POST["fname"] . " " . $_POST["lname"]; ?></td></tr>
</table>
