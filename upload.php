<?php
header('Content-Type: text/html; charset=utf-8');

$target_dir = "uploads/";
// Convert the filename to UTF-8 encoding
$filename = mb_convert_encoding($_FILES["fileToUpload"]["name"], "UTF-8", "auto");
$target_file = $target_dir . basename($filename);

// Check if a file was uploaded
if (isset($_FILES["fileToUpload"])) {
    // Try to upload the file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File ". htmlspecialchars(basename($filename)). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>