<?php 
require_once("../ElementForMainpage/database.php");
session_start();
$user_id = $_SESSION["userid"];
$day =$_POST["day"];
$month =$_POST["month"];
$year =$_POST["year"];
$decrip = $_POST["decrip"];
$rank = $_POST["rank"];
$time ="$year-$month-$day";
$sql ="INSERT INTO `history_down`( `id_user`, `decrip`, `rank`, `time`) VALUES ('$user_id','$decrip','$rank','$time')";
$statement = $con->prepare($sql);
if ($statement->execute()){
    echo "success";
}else {
    echo "error";   
}
?>