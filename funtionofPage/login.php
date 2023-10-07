<?php 
require_once("../ElementForMainpage/database.php");
session_start();
$userloginn =$_POST['userLogin'];
$passwordlogin = md5($_POST['passwordlogin']);
 $sql ="SELECT * FROM `useracc` WHERE `username` = '$userloginn' and  `password` = '$passwordlogin'";
 $statement= $con->prepare($sql);
// $result = $statement->fetchAll();
if ($statement->execute()) {
    if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION["userid"] = $row['id'];
        $_SESSION["userEmail"] = $row['email'];
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>