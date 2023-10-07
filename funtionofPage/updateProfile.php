<?php
require_once("../ElementForMainpage/database.php");
session_start();
if (isset($_SESSION["userid"])) {
    $user_id = $_SESSION["userid"];
    $username = $_POST["username"];
    $userphone = $_POST["phonenumber"];
    $useraddress = $_POST["usseraddress"];
    $useremail = $_POST["useremail"];

    if (isset($_FILES["fileToUpload"]["name"])) {
        $userimg = $_FILES["fileToUpload"]["name"];
        $image_folder = "../uploadfile/$userimg";
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_folder);
    } else {
        $userimg = "";
    }

    $sql1 = "SELECT * FROM `userprofile` WHERE `id_user` = :user_id";
    $statement = $con->prepare($sql1);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch();

    if ($result) {
        $sqlupdate = "UPDATE `userprofile` SET `name` = '$username', `address` ='$useraddress', `phonenumber` ='$userphone',`img`='$userimg' WHERE `id_user` ='$user_id'";
        $statement = $con->prepare($sqlupdate);
        if ($statement->execute()) {
            echo "success-UPDATE";
        } else {
            echo "error";
        }
    } else {
        $sql = "INSERT INTO `userprofile` (`id_user`, `name`, `address`, `phonenumber`, `img`) VALUES ('$user_id', '$username', '$useraddress', '$userphone', '$userimg')";
        $statement = $con->prepare($sql);
        if ($statement->execute()) {
            echo "success-INSERT";
        } else {
            echo "error";
        }
    }
} else {
    echo "error";
}
?>