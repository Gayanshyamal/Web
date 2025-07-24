<?php
session_start();
session_destroy();
header("Location: SignUp.php");
exit();
?>
