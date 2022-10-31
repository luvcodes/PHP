<html>
<head>
    <title>ALL IN ONE POST</title>
</head>
<body>
<?php
if (empty($_POST["fname"]) || empty($_POST["sname"])): ?>
<form method="post">
    First Name: <input type="text" name="fname"><br />
    Last Name: <input type="text" name="sname"><br />
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
</form>
<?php else:
    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    ?>
<tr>
    <td><?= $_POST["fname"]; ?></td>
    <td><?= $_POST["fname"] . " " . $_POST["sname"]; ?></td>
</tr>
<?php endif; ?>
</body>
</html>
