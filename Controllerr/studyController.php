<?php
include("./ElementForMainpage/database.php");
function getcmtstatus()
{
    global $con;
    $sql = "SELECT * FROM `poststatus`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
function poststatus($subject, $commentstatus)
{
    global $con;
    $user_id = $_SESSION["userid"];
    $sql = "SELECT `id_user`, `name` FROM `userprofile` WHERE id_user = :user_id";
    $statement = $con->prepare($sql);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    
    if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $iduser = $row["id_user"];
        $name = $row["name"];
        $sql = "INSERT INTO `poststatus` (`iduser`, `nameuser`, `subject`, `cmtStatus`) 
                VALUES (:iduser, :name, :subject, :commentstatus)";
        $statement = $con->prepare($sql);
        $statement->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
        $statement->bindParam(':commentstatus', $commentstatus, PDO::PARAM_STR);
        if ($statement->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    return false; 
}

?>