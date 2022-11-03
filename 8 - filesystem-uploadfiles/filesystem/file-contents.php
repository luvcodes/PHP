<?php
$file = $_GET["filename"];
echo "<h1>Source Code for: " . $file . "</h1>";
echo "<h2>Read line by line</h2>";
$fp = fopen($file, "r");
echo "<pre>";
while (!feof($fp)) {
    $line = fgets($fp);
    $line = htmlentities($line);
    echo $line;
}
echo "</pre>";
fclose($fp);

echo "<h1>Source Code for: " . $file . "</h1>";
echo "<h2>Read the entire file</h2>";
$content = file_get_contents($file);
$content = htmlentities($content);
echo "<pre>" . $content . "</pre>";

echo "<h1>Source Code for: " . $file . "</h1>";
echo "<h2>Read the entire file</h2>";
highlight_file($file);

