<?php
include("./ElementForMainpage/database.php");
require("./Model/group_db.php");
function getTest() {
    global $con; 
    $sql = "SELECT * FROM `test`";
    $statement = $con->prepare($sql);
    if($statement->execute()) {
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }else{
        return false;
    }
}
function checkTestdone($idtest) {
global $con;
if(isset($_SESSION["userid"])){
 $user_id =$_SESSION["userid"] ;
 $sql = "SELECT * FROM `checkingdone` WHERE id_user =:iduser AND id_testcheck = :idtest";
 $statement = $con->prepare($sql);
 $statement->bindValue(":iduser", $user_id, PDO::PARAM_INT);
 $statement->bindValue(":idtest", $idtest, PDO::PARAM_INT);
 if($statement->execute()){
    if($statement->rowCount() > 0){
        $row = $statement->fetch();
        return $row;
    }
 }
}
}
include "./View/9to10.php"
?>