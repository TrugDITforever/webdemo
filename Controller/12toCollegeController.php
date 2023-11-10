<?php 
include("./ElementForMainpage/database.php");
require("./Model/group_db.php");
function getExamtests() {
    global $con;
    $sql = "SELECT * FROM `exam_test`";
    $statement =$con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchALL();
    $statement->closeCursor();
    return $row;
}
include "./View/12toCollege.php"
?>