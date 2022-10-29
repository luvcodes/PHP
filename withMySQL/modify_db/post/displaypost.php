<html>
<head>
    <title>Simple Example - Sending Data Back to User</title>
</head>
<body>
<?php
$fname = $_POST["fname"];
$sname = $_POST["sname"];
?>
<table border="0">
    <tr>
        <td>Hi <?php echo $_POST["fname"]; ?>, welcome to PHP coding</td>
    </tr>
    <tr>
        <td><?php echo "By the way - your surname is $_POST[sname]"; ?></td>
    </tr>
    <tr>
        <td>Lets just check that - your full name is <?php echo "$fname $sname"; ?></td>
    </tr>
</table>
<pre id="windowlocation" style="white-space:pre-wrap"></pre>
<script>document.getElementById("windowlocation").innerText = window.location;</script>
</body>
</html>
