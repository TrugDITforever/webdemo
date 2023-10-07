<?php
include("./ElementForMainpage/database.php");
function getUserac()
{
    global $con;
    $sql = "SELECT * FROM `useracc`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
function getUserProfile()
{
    global $con;
    $sql = "SELECT * FROM `userprofile`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchALL();
    $statement->closeCursor();
    return $row;
}
function getExamtest()
{
    global $con;
    $sql = "SELECT * FROM `exam_test`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchALL();
    $statement->closeCursor();
    return $row;
}
?>