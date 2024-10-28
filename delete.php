<?php
header('Content-Type: text/html; charset=utf-8');

$target_dir = "uploads/";

if (isset($_GET['file'])) {
    $file = urldecode($_GET['file']);
    $file_path = $target_dir . basename($file);

    // Check if the file exists and is within the target directory
    if (file_exists($file_path) && is_file($file_path)) {
        if (unlink($file_path)) {
            echo "File ". htmlspecialchars(basename($file)). " has been deleted.";
        } else {
            echo "Failed to delete the file.";
        }
    } else {
        echo "File not found or invalid path.";
    }
} else {
    echo "No file specified for deletion.";
}

// Redirect back to the file list
header("Location: index.php");
exit();
?>