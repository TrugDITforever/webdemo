<?php
// check to get information of user in database useraccount
require_once("./ElementForMainpage/database.php");
    $user_id = $_SESSION["userid"];
    if (isset($user_id)) {
      $sql = "SELECT * FROM userprofile WHERE id_user = '$user_id'";
      $statement = $con->prepare($sql);
      $statement->execute();
      if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
      $sql = "SELECT * FROM useracc WHERE id = '$user_id'";
      $statement = $con->prepare($sql);
      $statement->execute();
      if($statement->rowCount()>0){
        $row2 = $statement->fetch(PDO::FETCH_ASSOC);
        $userEmail = $row2["email"];
      }
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