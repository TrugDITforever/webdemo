<?php
require_once("../ElementForMainpage/database.php");
include("../Model/Class/User.php");
$usersignup = $_POST['usernamesignup'];
$userpass = md5($_POST['passwordsignup']);
$userEmail = $_POST['userEmailsignup'];
$user = new User($usersignup, $userpass,$userEmail);
$user->register();
?>
