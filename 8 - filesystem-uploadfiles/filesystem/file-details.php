<?php
//we passed the name of the file via a QueryString
$file = $_GET["filename"];
echo "<h1>Details of file: ".$file."</h1>";
echo "<h2>File path: ".realpath($file)."</h2>";
echo "<h2>File data: </h2>";
echo "<ul>";
echo "<li>File last accessed: ".date("d/m/Y h:i A", fileatime($file))." - in one format</li>";
echo "<li>File last modified: ".date("j F Y H:i", filemtime($file))." - in another format</li>";
echo "<li>File type: " . filetype($file) . "</li>";
echo "<li>File size: " . filesize($file) . " bytes</li>";
echo "</ul>";
