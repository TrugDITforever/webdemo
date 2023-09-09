<?php 
$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="useraccount";
$con= mysqli_connect($db_server,$db_user,$db_pass,$db_name);
session_start();
$userloginn =$_POST['userLogin'];
$passwordlogin =$_POST['passwordlogin'];
 $sql ="SELECT * FROM `useracc` WHERE `username` = '$userloginn' and  `password` = '$passwordlogin'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){ 
    $row=mysqli_fetch_assoc($result);
$_SESSION["userid"]=$row['id'];
$_SESSION["userEmail"]=$row['email'];
    echo "success";
}
else {
    echo "error";
}
?>