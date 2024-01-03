<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learn and learn</title>

  <link rel="stylesheet" href="Cssfile/style.css">
  <link rel="stylesheet" href="Cssfile/userinfo.css">
  <link rel="icon" href="imgg/loggo.png" />
  <link rel="stylesheet" href="source font/fontawesome/fontawesome/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php include "ElementForMainpage/header.php"; ?>
  <div class="StartUserInfo">
    <div class="infoInterfaces">
      <div class="allINfor">
        <div class="Menuinfo">
          <div class="MainStuff">
            <div class="Tabmenu">
              <i class="fa-solid fa-gear"></i>
            </div>
            <div class="WordInfo">
              <h1>Trung tâm tài khoản</h1>
              <div class="wordtoclick">
                <p class="infor">
                  <i class="fa-regular fa-user"></i>Thông tin tài khoản
                </p>
              </div>
              <div class="wordtoclick">
                <p class="passwordBlock">
                  <i class="fa-solid fa-shield-halved"></i>Mật khẩu
                </p>
              </div>
              <div class="wordtoclick">
                <p class="btnhistory">
                  <i class="fa-solid fa-clock-rotate-left"></i>Lịch sử học tập
                </p>
              </div>
              <div class="wordtoclick">
                <p class="btnhistory-mypost">
                  <i class="fa-solid fa-clock-rotate-left"></i>Bài đăng của tôi
                </p>
              </div>
            </div>
            <div class="Logoutplace">
              <a>
                <p class="logoutbtn">
                  <i class="fa-solid fa-right-from-bracket"></i>
                  Log out
                </p>
              </a>
            </div>
          </div>
        </div>
        <div class="inforOfuser">
          <?php include("./ElementForMainpage/userinfolayout/BoxforInfo.php") ?>
        </div>
      </div>
    </div>
    <div class="Confirm-form-delete">
    <div class="confirm-whendelete">
      <h4>&nbsp<i class="fa-solid fa-triangle-exclamation" style="color: red;"></i>&nbspBạn có chắc chắn muốn xóa bài viết này!</h4>
      <div class="confirm-button">
        <button type="button" class="mark button secondary-button mr-12">Xác nhận</button>
        <button type="button" class="mark button primary-button">Hủy</button>
      </div>
    </div>
    </div>
    <div class="alert">
      <div class="alertword">
        <p>Bạn cần đăng nhập vào để xem tài liệu này</p>
        <a>
          <i class="fa-solid fa-xmark"></i>
        </a>
      </div>
    </div>
  </div>
  <?php include "./ElementForMainpage/Footer.php" ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="./fileJS/userinfo.js"></script>
</body>

</html>