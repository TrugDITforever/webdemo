<?php 
require_once("../ElementForMainpage/database.php");
if(isset($_POST['idexam'])){
$idexam = $_POST['idexam'];
$sql = "SELECT imgtest FROM `exam_test` WHERE id = $idexam";
$statement =$con->prepare($sql);
if($statement->execute()){
    $imgrow = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    $response = array(
        "message" => "success",
        "data" => $imgrow,
    );
    echo json_encode($response);
};
}
?>