<?php 
if(isset($_POST['reset'])){
    session_start();
    $_SESSION["userid"] = "";
    $_SESSION["userEmail"] = "";
     echo "success";
}
?>