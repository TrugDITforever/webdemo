<?php
require_once("../ElementForMainpage/database.php");
if (isset($_POST['postid'])) {
    $postID = $_POST['postid'];
    $sql = "SELECT * FROM poststatus where id = :postid";
    $statement = $con->prepare($sql);
    $statement->bindParam(":postid", $postID);
    if ($statement->execute()) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        $sql = "SELECT * FROM `usercmtstatus` WHERE id_post = :postid";
        $statement = $con->prepare($sql);
        $statement->bindParam(":postid", $postID);
        if ($statement->execute()) {
            $rowpost = $statement->fetchAll();
            $statement->closeCursor();
        }
    }
    $response = array(
        'message' => 'success',
        'data' => $row,
        'listcomments' => $rowpost
    );
    echo json_encode($response);
}
