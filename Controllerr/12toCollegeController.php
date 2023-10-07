<?php 
include("./ElementForMainpage/database.php");
function getExamtests() {
    global $con;
    $sql = "SELECT * FROM `exam_test`";
    $statement =$con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchALL();
    $statement->closeCursor();
    return $row;
}
?>