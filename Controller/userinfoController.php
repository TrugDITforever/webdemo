<?php
require_once("./ElementForMainpage/database.php");
    global $con;
    $sql = "SELECT * FROM `exam_test`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchALL();
    $statement->closeCursor();
    $user_id = $_SESSION["userid"];
    $userEmail = $_SESSION["userEmail"];
    if (isset($user_id) && isset($userEmail)) {
      $sql = "SELECT * FROM userprofile WHERE id_user = '$user_id'";
      $statement = $con->prepare($sql);
      $statement->execute();
      if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $userName = $row["name"];
        $useraddress = $row["address"];
        $phonenumber = $row["phonenumber"];
        if ($row["img"] == "") {
          $image = "imgg/team.png";
        } else {
          $imgg = $row["img"];
          $image = "uploadfile/$imgg";
        }
      } else {
        $image = "imgg/team.png";
        $userName = "";
        $useraddress = "";
        $phonenumber = "";
      }
    } else {
      $image = "imgg/team.png";
      $userName = "";
      $useraddress = "";
      $phonenumber = "";
    }
include "./View/userinfo.php"
?>