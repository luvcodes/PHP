<?php
$currentFilePath = $_SERVER["SCRIPT_FILENAME"];
echo "<b>Current PHP File is " . $currentFilePath . "</b><br/>";

// return the path of parent directory from a path using dirname()
$currentDirectoryPath = dirname($currentFilePath);
echo "<b>Current Directory is " . $currentDirectoryPath . "</b><br/>";
echo "<b>There is " . ceil(disk_free_space($currentDirectoryPath) / 1024 / 1024 / 1024) . " GiB of free space on this drive</b><br/>";
echo "<p></p>";

$directory = opendir($currentDirectoryPath);
echo "<ul>";
while ($file = readdir($directory)) {
    // We don't want to list "current directory" and "parent directory" pseudo-files, which is represented as . and ..
    if ($file == "." || $file == "..") continue;
    // You can use the same way to ignore files with specific format/extension name, with the help of https://www.php.net/manual/en/function.pathinfo.php
    if (is_dir($file)) {
        echo "<li><b>" . $file . "</b> - This is a directory - <a href='file-details.php?filename=" . urlencode($file) . "'>Details</a></li>";
    } else {
        echo "<li>" . $file . " - <a href='file-details.php?filename=" . urlencode($file) . "'>Details</a> <a href='file-contents.php?filename=" . urlencode($file) . "'>Contents</a> <a href='file-delete.php?filename=" . urlencode($file) . "'>Delete</a></li>";
    }
}
closedir($directory);
echo "</ul>";
