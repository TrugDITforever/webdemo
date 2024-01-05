<?php
include "../Model/databasecon.php";
class User
{
    private $nameacc;
    private $nameuser;
    private $password;
    private $email;
    private $phoneNumber;
    private $address;
    private $avatar;
    public function __construct($nameacc="", $password="", $email="", $nameuser ="", $phoneNumber ="", $address ="",$avatar="")
    {
        $this->nameacc = $nameacc;
        $this->password = $password;
        $this->email = $email;
        $this->nameuser = $nameuser;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->avatar = $avatar;
    }
    public function register()
    {
        session_start();
        $db = new Database();
        $conn = $db->getConnection();
        try {
            // Kiểm tra xem người dùng có trùng tên đăng nhập với người khác không
            $checkDuplicateUsername = "SELECT COUNT(*) FROM `useracc` WHERE `username` = :username";
            $checkStatement = $conn->prepare($checkDuplicateUsername);
            $checkStatement->bindParam(':username', $this->nameacc, PDO::PARAM_STR);
            $checkStatement->execute();
            if ($checkStatement->fetchColumn() > 0) {
                echo "duplicate";
            }
            // Nếu không trùng tên đăng nhập, thực hiện câu lệnh SQL để chèn thông tin người dùng vào cơ sở dữ liệu
            else {
                // Insert new user
                $sql = "INSERT INTO `useracc`(`username`, `password`, `email`,`access`) VALUES (:username, :password, :email, 1)";
                $statement = $conn->prepare($sql);
                $statement->bindParam(':username', $this->nameacc, PDO::PARAM_STR);
                $statement->bindParam(':password', $this->password, PDO::PARAM_STR);
                $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
                if ($statement->execute()) {
                    $statement->closeCursor();
                    //get username and id after signup success
                    $sql2 = "SELECT * FROM `useracc` WHERE `username` = :username";
                    $statement = $conn->prepare($sql2);
                    $statement->bindParam(':username',  $this->nameacc, PDO::PARAM_STR);

                    if ($statement->execute()) {
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                        $_SESSION["userid"] = $row['id'];
                        $_SESSION["userEmail"] = $row['email'];
                        $statement->closeCursor();
                        // Insert user profile
                        $userid = $row['id'];
                        $sqlProfile = "INSERT INTO `userprofile` (`id_user`, `name`,`img`) VALUES (:userid, :username, 'team.png')";
                        $statementProfile = $conn->prepare($sqlProfile);
                        $statementProfile->bindParam(':userid', $userid, PDO::PARAM_INT);
                        $statementProfile->bindParam(':username', $this->nameacc, PDO::PARAM_STR);
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
    }
    public function login(){
        session_start();
        $db = new Database();
        $conn = $db->getConnection();
        ///login for user 
        $sql ="SELECT * FROM `useracc` WHERE `username` = '$this->nameacc' and  `password` = '$this->password' and `access` =1";
        $statement= $conn->prepare($sql);
       if ($statement->execute()) {
           if ($statement->rowCount() > 0) {
               $row = $statement->fetch(PDO::FETCH_ASSOC);
               $_SESSION["userid"] = $row['id'];
               $_SESSION["userEmail"] = $row['email'];
               echo "success";
           } else {
               echo "error";
           }
       } else {
           echo "error";
       }
    }
    function updateprofile(){
        session_start();
        $db = new Database();
        $conn = $db->getConnection();
//check if user is already in the database
    $user_id = $_SESSION["userid"];
        $sql1 = "SELECT * FROM `userprofile` WHERE `id_user` = :user_id";
    $statement = $conn->prepare($sql1);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    if ($statement->rowCount()>0) {
        //update userprofile
        $sqlupdate = "UPDATE `userprofile` SET `name` = '$this->nameuser', `address` ='$this->address', `phonenumber` ='$this->phoneNumber',`img`='$this->avatar' WHERE `id_user` ='$user_id'";
        $statement = $conn->prepare($sqlupdate);
        if ($statement->execute()) {
            $statement->closeCursor();
            $sqlupdate2 = "UPDATE `useracc` SET `email`='$this->email' WHERE `id`='$user_id'";
            $statement2 = $conn->prepare($sqlupdate2);
            if ($statement2->execute()) {
                echo "success-UPDATE";
            }
        } else {
            echo "error";
        }
    } else {
        $sql = "INSERT INTO `userprofile` (`id_user`, `name`, `address`, `phonenumber`, `img`) VALUES ('$user_id', '$this->nameuser', '$this->address', '$this->phoneNumber', '$this->avatar')";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            echo "success-INSERT";
        } else {
            echo "error";
        }
    }
    }
}
