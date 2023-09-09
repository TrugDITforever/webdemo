<?php 
$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="useraccount";
session_start();
$con= mysqli_connect($db_server,$db_user,$db_pass,$db_name);
  try{

      $usersignup = $_POST['usernamesignup'];
      $userpass = $_POST['passwordsignup'];
      $userEmail = $_POST['userEmailsignup'];   
      $sql = "INSERT INTO `useracc`(`username`, `password`, `email`) VALUES ('$usersignup','$userpass','$userEmail')";
            $result = mysqli_query($con, $sql);
            if ($result) {
// $con= mysqli_connect($db_server,$db_user,$db_pass,$db_name);
$sql2 ="SELECT * FROM `useracc` WHERE `username` = '$usersignup'";
$result2 = mysqli_query($con,$sql2);
 $row=mysqli_fetch_assoc($result2);
$_SESSION["userid"]=$row['id'];
$_SESSION["userEmail"]=$row['email'];
$response='success';
echo $response;
              }
              else {
                $response= 'error';
                echo $response;
              }

}catch(mysqli_sql_exception $e){
  $response= 'error';
  echo $response;
}
    
?>
