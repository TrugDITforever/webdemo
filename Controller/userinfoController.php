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
        $userName = ($row["name"] == "") ? "":$row["name"] ;
        $useraddress = ($row["address"] == "") ? "":$row["address"] ;
        $phonenumber = ($row["phonenumber"] == "") ? "":$row["phonenumber"] ;
        $image = ($row["img"] == "") ? "" : 'uploadfile/' . $row["img"];
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
    $sql = "SELECT poststatus.id,poststatus.iduser,poststatus.nameuser,poststatus.subject, poststatus.cmtStatus,poststatus.img, userprofile.img AS imguser FROM `poststatus` INNER JOIN `userprofile` 
    WHERE poststatus.iduser = userprofile.id_user AND poststatus.iduser = :iduser";
    $statement = $con->prepare($sql);
    $statement->bindParam(":iduser",$user_id);
    $statement->execute();
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
function getPost_commentbyId($id)
{
    global $con;
    $sql = "SELECT usercmtstatus.id, usercmtstatus.username, usercmtstatus.comment, usercmtstatus.id_post, userprofile.img FROM `usercmtstatus` INNER JOIN `userprofile` WHERE usercmtstatus.id_uer = userprofile.id_user AND usercmtstatus.id_post=:postid";
    $statement = $con->prepare($sql);
    $statement->bindParam(":postid", $id);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $row = $statement->fetchAll();
        return $row;
    }
}
include ("./View/userinfo.php")
?>