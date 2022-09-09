<html>
<head>
    <title>POST - Form/Processing All in One</title>
</head>
<body bgcolor="wheat">
<?php
if (empty($_POST["fname"]) || empty($_POST["sname"])):
    ?>
    <!--不再定义action=""，因为要在同一个页面内接收用户数据并且打印用户数据-->
    <!--这个部份实际上是html页面的部份-->
    <form method="post">
        First Name <input type="text" name="fname"> <br/>
        Surname <input type="text" name="sname"> <br/>
        <input type="Submit" Value="Submit">
        <input type="Reset" Value="Clear Form Fields">
    </form>
<?php else:
    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    ?>
    <!--这个部份实际上是display的部份-->
    <table border="0">
        <tr><td>Hi <?php echo $_POST["fname"]; ?>, welcome to PHP coding</td></tr>
        <tr><td><?php echo "By the way - your surname is $_POST[sname]"; ?></td></tr>
        <tr><td>Lets just check that - your full name is <?php echo "$fname $sname"; ?></td></tr>
    </table>
<?php endif; ?>
</body>
</html>
