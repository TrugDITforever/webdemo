<?php
// <!-- check if the value of check in database checkingdone is true or false -->
require_once("../ElementForMainpage/database.php");
session_start();
if (isset($_POST['idpost'])) {
    $userid = $_SESSION["userid"];
    $idpost = $_POST['idpost'];
    $sql = "SELECT * FROM checkingdone WHERE id_testcheck = :idpost AND id_user = :iduser";
    $statement = $con->prepare($sql);
    $statement->bindParam(":idpost", $idpost, PDO::PARAM_INT);
    $statement->bindParam(":iduser", $userid, PDO::PARAM_INT);
    if ($statement->execute()) {
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            if (isset($row["check"]) && $row["check"] == "false") {
                $sql2 = "UPDATE `checkingdone` SET `check`='true' WHERE id_testcheck = :idpost";
                $statement = $con->prepare($sql2);
                $statement->bindParam(":idpost", $idpost, PDO::PARAM_STR);
                if ($statement->execute()) {
                    echo "true";
                } else {
                    echo "error";
                }
            } 
            else if (isset($row["check"]) && $row["check"] == "true") {
                $sql2 = "UPDATE `checkingdone` SET `check`='false' WHERE id_testcheck = :idpost";
                $statement = $con->prepare($sql2);
                $statement->bindParam(":idpost", $idpost, PDO::PARAM_INT);
                if ($statement->execute()) {
                    echo "false";
                } else {
                    echo "error";
                }
            }
        } 
        else {
            $value = "true";
            $sql = "INSERT INTO `checkingdone`(`id_user`, `id_testcheck`, `check`) VALUES (:iduser,:idpost,:value)";
            $statement = $con->prepare($sql);
            $statement->bindParam(":iduser", $userid, PDO::PARAM_INT);
            $statement->bindParam(":idpost", $idpost, PDO::PARAM_INT);
            $statement->bindParam(":value", $value, PDO::PARAM_STR);
            if ($statement->execute()) {
                echo "true";
            }
        }
    }
}
?>