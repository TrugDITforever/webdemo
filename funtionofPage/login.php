<?php 
// require_once("../Model/databasecon.php");
include("../Model/Class/User.php");
$userloginn =$_POST['userLogin'];
$passwordlogin = md5($_POST['passwordlogin']);
 $userlogin = new User($userloginn,$passwordlogin);
 $userlogin->login()
?>