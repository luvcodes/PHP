<!DOCTYPE html>
<head>
<title>Display the post</title>
</head>
<body>
<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
?>
<table>
    <tr><td>Welcome, <?php echo $_POST["firstname"]; ?></td></tr>
    <tr><td><?php echo "Your last name is  $_POST[lastname]"; ?></td></tr>
    <tr><td><?php echo "Anyway, nice to meet you $firstname $lastname"; ?></td></tr>
    <tr><td></td></tr>
</table>
</body>
</html>
