<?php
require("./ElementForMainpage/database.php");
// function getGrade()
// {
//     global $con;
//     $sql = "SELECT * FROM `gradelevel`";
//     $statement = $con->prepare($sql);
//     if ($statement->execute()) {
//         $row = $statement->fetchAll();
//         $statement->closeCursor();
//         return $row;
//     } else {
//         return false;
//     }
// }
function renderClass(){
    if (isset($_GET['rank'])) {
        global $con;
        $rank_render = $_GET['rank'];
        $namegrade = $_GET['name'];
        $sql = "SELECT nameClass, gradelevel.grade FROM `classlevel` INNER JOIN `gradelevel`  WHERE classlevel.id_grade = gradelevel.id
         AND classlevel.id_grade = :rank_get";
        $statement = $con->prepare($sql);
        $statement->bindValue(':rank_get', $rank_render);
        if ($statement->execute()) {
            $row = $statement->fetchAll();
         return $row;
        }
    }return false;
}

include "./View/testforcourse.php"
    ?>