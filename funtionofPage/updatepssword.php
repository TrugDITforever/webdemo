<?php
require_once("../ElementForMainpage/database.php");
session_start();
if (isset($_SESSION["userid"])) {
       $userid = $_SESSION["userid"];
       $currentpass = $_POST['currentpass'];
       $newpass = md5($_POST['newpass']);
       $sql = "SELECT * FROM  `useracc` WHERE `id` = $userid ";
       $statement = $con->prepare($sql);
       $statement->execute();
       $result = $statement->fetch();
       if ($result) {
              $sql2 = "UPDATE `useracc` SET `password`='$newpass' WHERE `id`=' $userid'";
              $statement = $con->prepare($sql2);
              if ($statement->execute()) {
                     echo "success";
              } else {
                     echo "error";
              }
       } else {
              echo "error";
       }
}