<?php function creategr()
{
    global $con;
    $user_id = $_SESSION["userid"];
    $namegr = filter_input(INPUT_POST, "nameGroup");
    if (isset($_FILES["fileCreategroup"]["name"])) {
        $image = $_FILES["fileCreategroup"]["name"];
        $image_folder = "./uploadfile/$image";
        move_uploaded_file($_FILES["fileCreategroup"]["tmp_name"], $image_folder);
    } else {
        $image = "";
    }
    $sql = "INSERT INTO `groupcreate`(`groupname`, `id_admin`, `image`) VALUES (:namegr, :admingr, '$image')";
    $statement = $con->prepare($sql);
    $statement->bindParam(':namegr', $namegr, PDO::PARAM_STR);
    $statement->bindParam(':admingr', $user_id, PDO::PARAM_INT);
    if ($statement->execute()) {
        return true;
    } else {
        return false;
    }
}
function getGroupteam()
{
    global $con;
    if(isset($_SESSION["userid"])){
        $useradmin = $_SESSION["userid"];
        $sql = "SELECT * FROM `groupcreate` where id_admin = :idadmin";
        $statement = $con->prepare($sql);
        $statement->bindParam(":idadmin", $useradmin, PDO::PARAM_INT);
        if ($statement->execute()) {
            $row = $statement->fetchAll();
            $statement->closeCursor();
            return $row;
        } else {
            return false;
        }
    }else {
        $useradmin = "";
        $sql = "SELECT * FROM `groupcreate` where id_admin = :idadmin";
        $statement = $con->prepare($sql);
        $statement->bindParam(":idadmin", $useradmin, PDO::PARAM_INT);
        if ($statement->execute()) {
            $row = $statement->fetchAll();
            $statement->closeCursor();
            return $row;
        } else {
            return false;
        }
    };
    
}
function getGroupAll()
{
    global $con;
    if(isset($_SESSION["userid"])){
        $useradmin = $_SESSION["userid"];
        $sql = "SELECT * FROM `groupcreate` where id_admin != :idadmin";
        $statement = $con->prepare($sql);
        $statement->bindParam(":idadmin", $useradmin, PDO::PARAM_INT);
        if ($statement->execute()) {
            $row = $statement->fetchAll();
            $statement->closeCursor();
            return $row;
        } else {
            return false;
        }
    }else {
        $useradmin="";
        $sql = "SELECT * FROM `groupcreate` where id_admin != :idadmin";
        $statement = $con->prepare($sql);   
        $statement->bindParam(":idadmin", $useradmin, PDO::PARAM_INT);
        if ($statement->execute()) {
            $row = $statement->fetchAll();
            $statement->closeCursor();
            return $row;
        } else {
            return false;
        }
    };
    
}?>