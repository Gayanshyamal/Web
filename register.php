<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "registration");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ===== Registration Section =====
if (isset($_POST['Register'])) {
    $fname = $_POST['Reg-firstname'];
    $lname = $_POST['Reg-lastname'];
    $birthday = $_POST['Birthday'];
    $email = $_POST['Reg-email'];
    $password = password_hash($_POST['RegPassword'], PASSWORD_DEFAULT); // Hash password

    // Insert into DB
    $sql = "INSERT INTO users (Firstname, Lastname, Birthday, Email, Password)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fname, $lname, $birthday, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! You can now log in.'); window.location.href='SignUp.php';</script>";
    } else {
        echo "<script>alert('Registration failed: " . $conn->error . "');</script>";
    }
    $stmt->close();
}

// ===== Login Section =====
if (isset($_POST['Login'])) {
    $email = $_POST['Login-email'];
    $password = $_POST['Login-password'];

    // Get user by email
    $sql = "SELECT * FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['Password'])) {
            // Correct login
            $_SESSION['user'] = $row;
            $_SESSION['email'] = $row['Email'];
            header("Location: Profile.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location.href='SignUp.php';</script>";
        }
    } else {
        echo "<script>alert('No user found with that email.'); window.location.href='SignUp.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// ... your existing code ...
?>
