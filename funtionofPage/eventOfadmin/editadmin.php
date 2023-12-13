<?php
include("../../Model/databasecon.php");
if (!empty($_POST['idadminacc'])) {
    $idadmin = $_POST['idadminacc'];
    $adminname = $_POST['adminname'];
    $adminpass = $_POST['adminpass'];
    $adminrole = $_POST['adminaccess'];
    $sql="UPDATE `adminacc` SET `adminname`=:adminname,`password`=:adminpass,`role`=:adminrole WHERE `id`=:idadmin";
    $statement = $con->prepare($sql);
    $statement->bindValue(':idadmin', $idadmin,PDO::PARAM_INT);
    $statement->bindValue(':adminname', $adminname, PDO::PARAM_STR);
    $statement->bindValue(':adminpass', $adminpass, PDO::PARAM_STR);
    $statement->bindValue(':adminrole', $adminrole, PDO::PARAM_STR);
    if ($statement->execute()) {
        echo "success";
    }else {
        echo "error";
    }
} else {
    $adminname = $_POST['adminname'];
    $adminpass = $_POST['adminpass'];
    $adminrole = $_POST['adminaccess'];
    $sql = "INSERT INTO `adminacc`( `adminname`, `password`, `role`) VALUES (:adminname, :adminpass,:adminrole) ";
    $statement = $con->prepare($sql);
    $statement->bindValue(':adminname', $adminname, PDO::PARAM_STR);
    $statement->bindValue(':adminpass', $adminpass, PDO::PARAM_STR);
    $statement->bindValue(':adminrole', $adminrole, PDO::PARAM_STR);
    if ($statement->execute()) {
        echo "success";
    }
}
?>