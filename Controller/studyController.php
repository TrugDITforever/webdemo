<?php
include("./ElementForMainpage/database.php");
require("./Model/group_db.php");
function getuserInfo() {
    global $con;
    $user_id = $_SESSION["userid"];
    $sql = "SELECT `id_user`, `name` FROM `userprofile` WHERE id_user = :user_id";
    $statement = $con->prepare($sql);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
}
}
function getcmtstatus()
{
    global $con;
    $sql = "SELECT * FROM `poststatus`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
function poststatus($subject, $commentstatus)
{
    global $con;
    $user_id = $_SESSION["userid"];
    $sql = "SELECT `id_user`, `name` FROM `userprofile` WHERE id_user = :user_id";
    $statement = $con->prepare($sql);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $iduser = $row["id_user"];
        $name = $row["name"];
        $sql = "INSERT INTO `poststatus` (`iduser`, `nameuser`, `subject`, `cmtStatus`) 
                VALUES (:iduser, :name, :subject, :commentstatus)";
        $statement = $con->prepare($sql);
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
        $statement->bindParam(':commentstatus', $commentstatus, PDO::PARAM_STR);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}
function getpostcomment()
{
    global $con;
    $sql = "SELECT * FROM `comments`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
/// bên th post này còn lỗi trong trường hợp người dùng chưa cập nhập ở trang hồ sơ
function postcomment($postcomment)
{
    global $con;
    $user_id = $_SESSION["userid"];
    $sql = "SELECT `id_user`, `name` FROM `userprofile` WHERE id_user = :user_id";
    $statement = $con->prepare($sql);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $iduser = $row["id_user"];
        $name = $row["name"];
        $sql = "INSERT INTO `comments`(`id_user`, `nameuser`,`comment`) VALUES (:iduser,:nameuser,:comment)";
        $statement = $con->prepare($sql);
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $statement->bindParam(':nameuser', $name, PDO::PARAM_STR);
        $statement->bindParam(':comment', $postcomment, PDO::PARAM_STR);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}

function actioninstudy()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = filter_input(INPUT_POST, "action");
        if ($action === "postcomment") {
            $comment = $_POST["comments"];
            postcomment($comment);
        } else if ($action === "poststatus") {
            $subject = filter_input(INPUT_POST, "subject-status");
            $decrip = filter_input(INPUT_POST, "decrip-status");
            poststatus($subject, $decrip);
        } else if ($action === "gr-create") {
            creategr();
        }
    }
   
}
include("./View/study.php");
