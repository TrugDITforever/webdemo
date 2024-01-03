<?php
require_once("../ElementForMainpage/database.php");
session_start();

$usersignup = $_POST['usernamesignup'];
$userpass = md5($_POST['passwordsignup']);
$userEmail = $_POST['userEmailsignup'];

try {
    // Check if the username already exists
    $checkDuplicateUsername = "SELECT COUNT(*) FROM `useracc` WHERE `username` = :username";
    $checkStatement = $con->prepare($checkDuplicateUsername);
    $checkStatement->bindParam(':username', $usersignup, PDO::PARAM_STR);
    $checkStatement->execute();
    if ($checkStatement->fetchColumn() > 0) {
        $response = 'duplicate';
        echo $response;
    } else {
        // Insert new user
        $sql = "INSERT INTO `useracc`(`username`, `password`, `email`,`access`) VALUES (:username, :password, :email, 1)";
        $statement = $con->prepare($sql);
        $statement->bindParam(':username', $usersignup, PDO::PARAM_STR);
        $statement->bindParam(':password', $userpass, PDO::PARAM_STR);
        $statement->bindParam(':email', $userEmail, PDO::PARAM_STR);

        if ($statement->execute()) {
            $statement->closeCursor();
        
            $sql2 = "SELECT * FROM `useracc` WHERE `username` = :username";
            $statement = $con->prepare($sql2);
            $statement->bindParam(':username', $usersignup, PDO::PARAM_STR);

            if ($statement->execute()) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $_SESSION["userid"] = $row['id'];
                $_SESSION["userEmail"] = $row['email'];
                $statement->closeCursor();

                // Insert user profile
                $userid = $row['id'];
                $sqlProfile = "INSERT INTO `userprofile` (`id_user`, `name`,`img`) VALUES (:userid, :username, 'team.png')";
                $statementProfile = $con->prepare($sqlProfile);
                $statementProfile->bindParam(':userid', $userid, PDO::PARAM_INT);
                $statementProfile->bindParam(':username', $usersignup, PDO::PARAM_STR);
                $statementProfile->execute();
            }
            $response = 'success';
            echo $response;
        } else {
            $response = 'error';
            echo $response;
        }
    }
} catch (PDOException $e) {
    $response = 'error';
    echo $response;
}
?>
