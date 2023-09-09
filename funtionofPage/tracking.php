<?php 
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "useraccount";
$con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
session_start();
$user_id = $_SESSION["userid"];
$day =$_POST["day"];
$month =$_POST["month"];
$year =$_POST["year"];
$decrip = $_POST["decrip"];
$rank = $_POST["rank"];
$time ="$year-$month-$day";
$sql ="INSERT INTO `history_down`( `id_user`, `decrip`, `rank`, `time`) VALUES ('$user_id','$decrip','$rank','$time')";
$result = mysqli_query($con, $sql);
if ($result){
    echo "success";
}else {
    echo "error";   
}
?>