<?php
// check to get information of user in database useraccount
require_once("./ElementForMainpage/database.php");
if (isset( $_SESSION["userid"])) {
      $user_id = $_SESSION["userid"];
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
        $sql = "SELECT * FROM useracc WHERE id = '$user_id'";
      $statement = $con->prepare($sql);
      $statement->execute();
      if($statement->rowCount()>0){
        $row2 = $statement->fetch(PDO::FETCH_ASSOC);
        $userEmail = $row2["email"];
      }
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

    function getMypost()
{
    global $con;
    $user_id = $_SESSION["userid"];
    $sql = "SELECT * FROM `poststatus` WHERE iduser = :iduser";
    $statement = $con->prepare($sql);
    $statement->bindParam(":iduser",$user_id);
    $statement->execute();
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
include ("./View/userinfo.php")
?>