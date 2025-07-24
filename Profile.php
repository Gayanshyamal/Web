<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$conn = new mysqli("localhost", "root", "", "registration");

if (!isset($_SESSION['email'])) {
    header("Location: SignUp.php");
    exit;
}

$email = $_SESSION['email'];
$result = $conn->query("SELECT * FROM users WHERE Email='$email'");
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found in database.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HC.css">
    <title>My Profile</title>
    <style>
        .profile-card {
            background: transparent;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,.5);
            width: 400px;
            padding: 25px;
            color: aliceblue;
            margin: 50px auto;
            border-radius: 15px;
            text-align: center;
        }
        .profile-card img {
            border-radius: 50%;
            width: 140px;
            height: 140px;
            object-fit: cover;
            margin-bottom: 15px;
            border: 2px solid white;
        }
        input[type="file"], button {
            margin-top: 10px;
        }
        .file-upload 
        {
        display: none;
        }

        .custom-file-label 
        {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
            height: 17px;
            position: relative;
            top: 3px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .custom-file-label:hover 
        {
            background-color: #6c726dff;
        }

        .upload-button {
            margin-top: 10px;
            padding: 8px 15px;
            border: none;
            background-color: blue;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .upload-button:hover 
        {
            background-color:#6c726dff;
        }

        .remove-button
        {
            border: none;
            background:transparent;
            color: aliceblue;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        
        .remove-button:hover
        {
            cursor: pointer;
            color: #162938;
            border-radius: 5px;
            border: 2px solid aliceblue;
            background:aliceblue;
        }



        a button
        {
            border-radius: 5px;
            background: transparent;
            color:aliceblue;
            border: 2px solid aliceblue;
        }
        a button:hover
        {
            background:aliceblue;
            color:#162938;
        }
    </style>
</head>
<body>
    <div class="BGimage">
        <div class="profile-card">
            <h1>Welcome, <?= htmlspecialchars($user['Firstname']) ?>!</h1>

            <!-- Display profile picture -->
            <?php
                if (!empty($user['profile_pic']) && file_exists($user['profile_pic'])) 
                {
                    echo "<img src='{$user['profile_pic']}' alt='Profile Picture'><br>";
                    echo "
                        <form action='profilepic.php' method='POST' style='margin-top: 10px;'>
                            <input type='hidden' name='remove_pic' value='1'>
                            <button type='submit' class='remove-button' >Remove Profile Picture</button>
                        </form>";
                } 
                else 
                {
                    echo "<img src='Default_Pic.jpg' alt='Default Picture'>";
                }
            ?>

            <!-- Upload form -->
            <form action="profilepic.php" method="POST" enctype="multipart/form-data">
                <label for="fileInput" class="custom-file-label">Select Picture</label>
                <input type="file" id="fileInput" name="profilePic" class="file-upload" accept="image/*" required>
                <button type="submit" class="upload-button">Upload Picture</PIcture></button>
            </form>

            <!-- User info -->
            <p><strong>First Name:</strong> <?= htmlspecialchars($user['Firstname']) ?></p>
            <p><strong>Last Name:</strong> <?= htmlspecialchars($user['Lastname']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['Email']) ?></p>
            <p><strong>Birthday:</strong> <?= htmlspecialchars($user['Birthday']) ?></p>

            <a href="logout.php"><button>Logout</button></a>
        </div>
    </div>
</body>
</html>
