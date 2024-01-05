<?php
include("../Model/Class/User.php");
    $username = $_POST["username"];
    $userphone = $_POST["phonenumber"];
    $useraddress = $_POST["usseraddress"];
    $useremail = $_POST["useremail"];
    if (isset($_FILES["fileToUpload"]["name"])) {
        $userimg = $_FILES["fileToUpload"]["name"];
        $image_folder = "../uploadfile/$userimg";
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_folder);
    } else {
        $userimg = $_POST['fileToUpload'];
    }
    $userupdate = new User( "","",$useremail, $username ,$userphone ,$useraddress,$userimg);
$userupdate->updateprofile();
?>