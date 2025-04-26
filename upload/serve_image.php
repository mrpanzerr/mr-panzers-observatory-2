<?php
session_start();

// Check if user session exists
if (!isset($_SESSION['folder'])) {
    require('includes/header.php');
    echo "<h2>You must be logged in to view images</h2>";
    echo "<h3>Please use the login link to log in.</h3>";
    include('includes/footer.php');
    exit;
}

$folder = $_SESSION['folder'];

// Check if an image is requested
if (isset($_GET['image'])) {
    $imageName = basename($_GET['image']); // Always use basename() for safety

    // Validate image extension
    $allowedExtensions = ['.jpg', 'jpeg', '.png', '.gif'];
    $ext = strtolower(substr($imageName, -4)); // Gets last 4 chars for extension

    if (in_array($ext, $allowedExtensions)) {
        // Build the file path
        $imagePath = "../../../../MPO_uploads/$folder/$imageName";

        // Check if file exists
        if (file_exists($imagePath) && is_file($imagePath)) {
            $imageInfo = getimagesize($imagePath);
            $fileSize = filesize($imagePath);

            // Set headers
            header("Content-Type: {$imageInfo['mime']}");
            header("Content-Disposition: inline; filename=\"$imageName\"");
            header("Content-Length: $fileSize");

            // Output the image
            readfile($imagePath);
            exit;
        }
    }
}

// If something goes wrong
echo "Image not found or invalid request.";
?>
