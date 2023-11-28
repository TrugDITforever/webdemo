<?php 
require_once("../ElementForMainpage/database.php");
if(isset($_POST['postid'])){
    $postid = $_POST['postid'];
    $sqldel= "DELETE FROM `poststatus` WHERE id = :postid";
    $statement =$con->prepare($sqldel);
    $statement->bindValue(':postid',$postid,PDO::PARAM_INT);
if($statement->execute()){
    echo "success";
}else{
    echo "error";
}
}
?>