<!DOCTYPE html>
<head>
<title>Display get</title>
</head>
<body>
<?php
$fname = $_GET["fname"];
$lname = $_GET["lname"];
?>
<table>
    <tr><td>Hi, <?php echo $_GET["fname"] ?></td></tr>
    <tr><td><?php echo "Your lastname: $_GET[lname]" ?></td></tr>
    <tr><td>Full name: <?php echo $_GET["fname"] . $_GET["lname"] ?></td></tr>
    <tr><td><?php var_dump($_GET["fname"]) . var_dump($_GET["lname"]);?> </td></tr>
</table>
</body>
</html>
