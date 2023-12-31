<?php
require_once("../ElementForMainpage/database.php");
if (isset($_POST['idsub'])) {
    $idsub = $_POST['idsub'];
    $namesub = $_POST['namesub'];
    $detailword = $_POST['detailword'];
    $filename = $_POST['filename'];
    $sqlcheck = "SELECT * FROM exam_test Where id ='$idsub'";
    $statement = $con->prepare($sqlcheck);
    $statement->execute();;
    if (($statement->rowCount() > 0)) {
        $sqlupdate = "UPDATE exam_test SET subject = '$namesub', decrip ='$detailword',imgtest ='$filename' WHERE id = '$idsub'";
        $statement = $con->prepare($sqlupdate);
        if ($statement->execute()) {
            $statement->closeCursor();
            $sqlget = "SELECT * FROM exam_test ";
            $statement = $con->prepare($sqlget);
            if ($statement->execute()) {
                $row = $statement->fetchAll();
                $response = array(
                    'message' => 'success',
                    'data' => $row,
                );
                echo json_encode($response);
            }
        } else {
            echo 'error';
        }
    } else {
        $sqlinsert = "INSERT INTO `exam_test`(`subject`,`decrip`,`imgtest`) VALUES ('$namesub','$detailword','$filename')";
        $statement = $con->prepare($sqlinsert);
        if ($statement->execute()) {
            $statement->closeCursor();
            $sqlget = "SELECT * FROM exam_test ";
            $statement = $con->prepare($sqlget);
            if ($statement->execute()) {
                $row = $statement->fetchAll();
                $response = array(
                    'message' => 'success',
                    'data' => $row,
                );
                echo json_encode($response);
            }
        } else {
            echo 'error';
        }
    }
}
// delete documents from exam_test(for admindoc)
if (isset($_POST['idsubdel'])) {
    $idsubdel = $_POST['idsubdel'];
    $sqldel = "DELETE FROM exam_test WHERE id = '$idsubdel'";
    $statement = $con->prepare($sqldel);
    if ($statement->execute()) {
        $response = array(
            'message' => 'success',
        );
        echo json_encode($response);
    } else {
        echo "error";
    }
}
//del admin acc for adminParent
if (isset($_POST['idadminacc'])) {
    $idsubdel = $_POST['idadminacc'];
    $sqldel = "DELETE FROM adminacc WHERE id = '$idsubdel'";
    $statement = $con->prepare($sqldel);
    if ($statement->execute()) {
        $response = array(
            'message' => 'success',
        );
        echo json_encode($response);
    } else {
        echo "error";
    }
}
///update access of useracc in adminpost-acc
if (isset($_POST['iduseracc'])) {
    $idsubdel = $_POST['iduseracc'];
    $sqldel = "SELECT * FROM `useracc` WHERE id = :id";
    $statement = $con->prepare($sqldel);
    $statement->bindParam(':id', $idsubdel, PDO::PARAM_INT);
    if ($statement->execute()) {
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $newAccessValue = ($row['access'] == 1) ? 0 : 1;
            $sqlupdate = "UPDATE `useracc` SET `access` = :newAccess WHERE id = :id";
            $statement = $con->prepare($sqlupdate);
            $statement->bindParam(':newAccess', $newAccessValue, PDO::PARAM_INT);
            $statement->bindParam(':id', $idsubdel, PDO::PARAM_INT);

            if ($statement->execute()) {
                $response = array(
                    'message' => 'success',
                );
            } else {
                $response = array(
                    'message' => 'error',
                );
            }
        } else {
            $response = array(
                'message' => 'error',
            );
        }
    } else {
        $response = array(
            'message' => 'error',
        );
    }
    echo json_encode($response);
}


// delete usserpost in adminpost-acc
if (isset($_POST['idpost'])) {
    $idpost = $_POST['idpost'];
    $sqldel = "DELETE FROM `poststatus` WHERE id = :postid";
    $statement = $con->prepare($sqldel);
    $statement->bindValue(':postid', $idpost, PDO::PARAM_INT);
    if ($statement->execute()) {
        echo "success";
    }
}
// delete usercomment in adminpost-acc
if (isset($_POST['idcmt'])) {
    $idcmt = $_POST['idcmt'];
    $sqldel = "DELETE FROM `usercmtstatus` WHERE id = :idcmt";
    $statement = $con->prepare($sqldel);
    $statement->bindValue(':idcmt', $idcmt, PDO::PARAM_INT);
    if ($statement->execute()) {
        echo "success";
    }
}
