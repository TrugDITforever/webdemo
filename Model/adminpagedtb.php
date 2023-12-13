<?php
function getUserac()
{
    global $con;
    $sql = "SELECT * FROM `useracc` INNER JOIN `userprofile` ON useracc.id = userprofile.id_user";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
function getAdminacc()
{
    global $con;
    $sql = "SELECT * FROM `adminacc`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}

function getExamtest()
{
    global $con;
    $sql = "SELECT * FROM `exam_test`";
    $statement = $con->prepare($sql);
    $statement->execute();
    $row = $statement->fetchALL();
    $statement->closeCursor();
    return $row;
}
function getUserpost()
{
    global $con;
    $sql = "SELECT * FROM `poststatus`";
    $statement = $con->prepare($sql);
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
