<?php
$file = $_GET["filename"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unlink($file); // Delete the given file
    header('Location: index.php'); // And go back to previous page
}
?>
<form method="post">
    <h1>Do you really want to delete the following file?</h1>
    <h2>File path: <?= realpath($file) ?></h2>
    <input type="submit" value="Yes!"/>
</form>
