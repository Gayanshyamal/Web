<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$conn = new mysqli("localhost", "root", "", "registration");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

// === Handle Profile Picture Removal ===
if (isset($_POST['remove_pic'])) {
    // Get current profile picture path
    $result = $conn->query("SELECT profile_pic FROM users WHERE Email='$email'");
    $row = $result->fetch_assoc();

    // Delete the file from uploads folder
    if ($row && !empty($row['profile_pic']) && file_exists($row['profile_pic'])) {
        unlink($row['profile_pic']);
    }

    // Update DB: remove path
    $conn->query("UPDATE users SET profile_pic=NULL WHERE Email='$email'");
    
    header("Location: Profile.php");
    exit;
}

// === Handle Profile Picture Upload ===
if (isset($_FILES['profilePic'])) {
    $file = $_FILES['profilePic'];

    // Validate type
    $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($file['type'], $allowed)) {
        echo "Only JPG or PNG allowed.";
        exit;
    }

    // Optional: check size
    if ($file['size'] > 2 * 1024 * 1024) {
        echo "Image size must be less than 2MB.";
        exit;
    }

    // Unique filename
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = "uploads/" . md5($email) . "." . $ext;

    // Ensure uploads directory exists
    if (!is_dir("uploads")) {
        mkdir("uploads", 0755, true);
    }

    // Save file
    if (move_uploaded_file($file['tmp_name'], $fileName)) {
        // Save path to DB
        $stmt = $conn->prepare("UPDATE users SET profile_pic=? WHERE Email=?");
        $stmt->bind_param("ss", $fileName, $email);
        $stmt->execute();
        $stmt->close();

        header("Location: Profile.php");
        exit;
    } else {
        echo "Upload failed.";
    }
}
?>
