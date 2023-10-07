<?php
require_once("../ElementForMainpage/database.php");
if (isset($_POST['idsub'])) {
    $idsub = $_POST['idsub'];
    $namesub = $_POST['namesub'];
    $detailword = $_POST['detailword'];
    $sqlcheck = "SELECT * FROM exam_test Where id ='$idsub'";
    $statement = $con->prepare($sqlcheck);
    $statement->execute();
    $resultcheck = $statement->fetch();
    if (($resultcheck)) {
        $sqlupdate = "UPDATE exam_test SET subject = '$namesub', decrip ='$detailword' WHERE id = '$idsub'";
        $statement = $con->prepare($sqlupdate);
        if ($statement->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        $sqlinsert = "INSERT INTO `exam_test`(`subject`,`decrip`) VALUES ('$namesub','$detailword')";
        $statement = $con->prepare($sqlinsert);
        if ($statement->execute()) {
            echo "success";
        } else {
            echo 'error';
        }
    }
}
if (isset($_POST['idsubdel'])) {
    $idsubdel = $_POST['idsubdel'];
    $sqldel = "DELETE FROM exam_test WHERE id = '$idsubdel'";
    $statement = $con->prepare($sqldel);
    if ($statement->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>