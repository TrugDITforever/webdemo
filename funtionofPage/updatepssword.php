<?php 
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "useraccount";
$con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
session_start();
if (isset($_SESSION["userid"])){
  $userid = $_SESSION["userid"];
         $currentpass = $_POST['currentpass'];
         $newpass = $_POST['newpass'];
         $sql = "SELECT * FROM  `useracc` WHERE `id` = $userid ";
         $result2= mysqli_query($con, $sql);
          if ($result2){
    $sql2 ="UPDATE `useracc` SET `password`='$newpass' WHERE `id`=' $userid'";
           $result3= mysqli_query($con, $sql2);
           if($result3){
            echo "success";
           }else{
            echo "error";
           }
}else{
    echo "error";
   }
}
?>