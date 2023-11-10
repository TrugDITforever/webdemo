<?php   
require_once("../ElementForMainpage/database.php");
if (isset($_POST['iduser']) && isset($_POST['username'])&&isset($_POST['comment'])&&isset($_POST['postid'])){
$iduser = $_POST['iduser'];
$username = $_POST['username'];
$comment = $_POST['comment'];
$postID = $_POST['postid'];
$sql = "INSERT INTO `usercmtstatus`( `id_uer`, `id_post`,`username`, `comment`) 
VALUES (:iduser,:idpost,:username,:comment)";
$statement =$con->prepare($sql);
$statement->bindParam(":iduser", $iduser, PDO::PARAM_INT);
$statement->bindParam(":idpost", $postID, PDO::PARAM_STR);
$statement->bindParam(":username", $username, PDO::PARAM_STR);
$statement->bindParam(":comment", $comment, PDO::PARAM_STR);
if($statement->execute()){
    $response =array(
        "message"=> "success",
        "data"=> $_POST["postid"],
    );
    echo json_encode($response);

}else return false;
}
          ?>