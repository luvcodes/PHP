<?php session_start(); ?>
<html lang="en_AU">
<head>
    <title>Sessions and cookies</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['store'])) {
    if ($_POST['store'] === 'cookie') {
        if (!empty($_POST['colour'])) {
            setcookie('colour', $_POST['colour'], 0); // 0 for expire param meaning the cookie expires when quit the browser
            echo "<h1>COOKIE for colour is updated to " . $_POST['colour'] . "</h1>";
        } else {
            setcookie('colour', null, -1); // -1 for expire param meaning the cookie expires immediately (i.e. destroy cookie)
            echo "<h1>COOKIE for colour is removed!</h1>";
        }
    } else {
        if (!empty($_POST['colour'])) {
            $_SESSION['colour'] = $_POST['colour'];
            echo "<h1>SESSION for colour is updated to " . $_SESSION['colour'] . "</h1>";
        } else {
            session_destroy();
            echo "<h1>SESSION for colour is removed!</h1>";
        }
    }
} else {
    if (isset($_COOKIE['colour'])) {
        echo "<h1>The current colour in COOKIE is " . $_COOKIE['colour'] . "</h1>";
    } else {
        echo "<h1>There's no COOKIE for colour!</h1>";
    }

    if (isset($_SESSION['colour'])) {
        echo "<h1>The current colour in SESSION is " . $_SESSION['colour'] . "</h1>";
    } else {
        echo "<h1>There's no SESSION for colour!</h1>";
    }
}
?>
<form method="post">
    <label for="colour">Colour</label>
    <input type="text" id="colour" name="colour"/>
    <input type="hidden" name="store" value="cookie"/>
    <input type="submit" value="Update colour in cookies"/>
</form>
<form method="post">
    <label for="colour">Colour</label>
    <input type="text" id="colour" name="colour"/>
    <input type="hidden" name="store" value="session"/>
    <input type="submit" value="Update colour in sessions"/>
</form>
</body>
</html>
