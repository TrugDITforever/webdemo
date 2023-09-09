<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "useraccount";

session_start();
$con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$con) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if (isset($_SESSION["userid"])) {
    $user_id = $_SESSION["userid"];
    $username = $_POST["username"];
    $userphone = $_POST["phonenumber"];
    $useraddress = $_POST["usseraddress"];
    $useremail = $_POST["useremail"];

    if (isset($_FILES["fileToUpload"]["name"])) {
        $userimg = $_FILES["fileToUpload"]["name"];
        $image_folder = 'C:/xampp/htdocs/WebUsePhp/webusePhp/uploadfile/' . $userimg;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_folder);
    } elseif (isset($_POST['fileToUpload'])) {
        $userimg = $_POST['fileToUpload'];
    }

    $sql2 = "SELECT * FROM `userprofile` WHERE `id_user` = '$user_id'";
    $result2 = mysqli_query($con, $sql2);

    if ($result2) {
        $sqlupdate = "UPDATE `userprofile` SET `name` = '$username', `address` ='$useraddress', `phonenumber` ='$userphone',`img`='$userimg' WHERE `id_user` ='$user_id'";
        $resultupdate = mysqli_query($con, $sqlupdate);
        if ($resultupdate) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        $sql = "INSERT INTO `userprofile` (`id_user`, `name`, `address`, `phonenumber`, `img`) VALUES ('$user_id', '$username', '$useraddress', '$userphone', '$userimg')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
} else {
    echo "error";
}

mysqli_close($con);
?>
