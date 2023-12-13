<?php 
require_once "./Model/databasecon.php";
if(isset($_POST['submit'])){
    $adminname = $_POST['adminname'];
    $password = $_POST['password'];
    $sql ="SELECT * FROM adminacc WHERE adminname =:adminname and password =:password";
    $statement = $con->prepare($sql);
    $statement->bindParam(':adminname',$adminname,PDO::PARAM_STR);
    $statement->bindParam(':password',$password,PDO::PARAM_STR);
    $statement->execute();
    if($statement->rowCount()>0){
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if($row['role'] == 'admin'){
    header('Location:index?route=admin&role=admin');
        }else if($row['role'] == 'admin_doc'){
    header('Location:index?route=admin&role=admindoc');
        }else if($row['role'] == 'admin_acc'){
            header('Location:index?route=admin&role=adminpost');
                }
    }else {
        $error[] ="Hãy kiểm tra lại tên đăng nhập/mật khẩu";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN-PAGE</title>
  <link rel="icon" href="imgg/loggo.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="source font/fontawesome/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="Cssfile/style.css">
  <link rel="stylesheet" href="Cssfile/adminpage.css">
</head>
<body>
    <div class="background-adminlogin">
        <div class="Admin-login">
          <!-- <i class="fa-solid fa-circle-xmark" onClick="{closeform}" id="close"></i> -->
        <div class="containform-login">
          <div class="Picture-Login">
          <img src="https://static.vecteezy.com/system/resources/previews/024/346/428/original/3d-cartoon-group-of-little-children-on-transparent-background-generative-ai-png.png" alt="">
          </div>
          <div>
          <form class="adminform" method="Post" enctype="multipart/form-data">
            <h4>
            <i class="fa-solid fa-hand wavinglogin" style="color: #dfe156;"></i> Bonjour! Chào mừng Admin
            </h4>
            <div class="admin-form" id="adminform">
              <?php if(isset($error)){
                foreach($error as $error){
              echo '<div style="color: red">' . $error . '</div>';
                }
              }?>
              <label ><i class="fa-regular fa-circle-user"></i>&nbspTên đăng nhập:</label>
              <input type="text" name="adminname" required />
              <label ><i class="fa-solid fa-lock"></i>&nbspMật khẩu:</label>
              <input type="password"  name="password" required />
            </div>
            <input id="admin-btn" class="adminbtn" name="submit"type="submit" value="Đăng nhập" />
          </form>
          </div>
        </div>
        </div>
    </div>
</body>
</html>