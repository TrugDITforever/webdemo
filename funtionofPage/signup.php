<?php
require_once("../ElementForMainpage/database.php");
session_start();
try {
  $usersignup = $_POST['usernamesignup'];
  $userpass = md5($_POST['passwordsignup']);
  $userEmail = $_POST['userEmailsignup'];
  $sql = "INSERT INTO `useracc`(`username`, `password`, `email`) VALUES ('$usersignup','$userpass','$userEmail')";
  $statement = $con->prepare($sql);
  if ($statement->execute()) {
    $statement->closeCursor();
    $sql2 = "SELECT * FROM `useracc` WHERE `username` = '$usersignup'";
    $statement = $con->prepare($sql2);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $_SESSION["userid"] = $row['id'];
    $_SESSION["userEmail"] = $row['email'];
    $statement->closeCursor();
    $response = 'success';
    echo $response;
  } else {
    $response = 'error';
    echo $response;
  }
} catch (mysqli_sql_exception $e) {
  $response = 'error';
  echo $response;
}
