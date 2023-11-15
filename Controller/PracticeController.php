<?php
include("./ElementForMainpage/database.php");
require("./Model/group_db.php");
function renderClass(){
    if (isset($_GET['rank'])) {
        global $con;
        $rank_render = $_GET['rank'];
        // $namegrade = $_GET['name'];
        $sql = "SELECT nameClass, gradelevel.grade,image  FROM `classlevel` INNER JOIN `gradelevel`  WHERE classlevel.id_grade = gradelevel.id
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