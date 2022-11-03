<?php
// Process the form to upload the file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    var_dump($_POST);
    var_dump($_FILES);
    echo "</pre>";
    echo "<hr>";
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        // Check file's MIME type
        if ($_FILES['file']['type'] === 'image/jpeg') {
			/** We're hard-coding uploads folder for destination, but in reality you might want to check if
			 *  the user given file name contains directory separator, or '..' (parent directory) symbols
			 *  because just like SQL, file upload can be injected as well!
			 *  In this specific instance, I use basename() to filter any given file name to ensure any given
			 *  path is removed from the final filename.
			 */
			$fileDestination = "uploads" . DIRECTORY_SEPARATOR . (empty($_POST['fname']) ? $_FILES['file']['name'] : basename($_POST['fname']));
			var_dump($fileDestination);
			if (move_uploaded_file($_FILES['file']['tmp_name'], $fileDestination)) {
				echo "<h1>File is uploaded and stored successfully!</h1>";
			} else {
				echo "<h1>File cannot be stored to the final destination!</h1>";
			}
		} else {
            echo "<h1 style='color:red'>You must upload a JPG file!</h1>";
        }
    } else {
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );
        echo "<h1>Uploaded file cannot be processed!</h1>";
        $errorMessage = (isset($_FILES['file']['error'])) ? $phpFileUploadErrors[$_FILES['file']['error']] : "Unknown error";
        echo "<p>Error message: " . $errorMessage . "</p>";
    }
    echo "<hr>";
}

$directory = opendir('uploads');
echo "<h1>Existing files in the folder: </h1>";
echo "<ul>";
while ($file = readdir($directory)) {
    // We don't want to list "current directory" and "parent directory" pseudo-files
    if ($file == "." || $file == "..") continue;

    if (is_dir($file)) {
        echo "<li><b>" . $file . "</b> - This is a directory</li>";
    } else {
        echo "<li>" . $file . "</li>";
    }
}
closedir($directory);
echo "</ul>";
?>
<hr>


<h1>Upload a file</h1>
<form method="post" enctype="multipart/form-data">
    <label for="file">Select a file to upload:</label>
    <input type="file" id="file" name="file"/><br><br>
    <input type="submit" value="Upload!">
</form>
