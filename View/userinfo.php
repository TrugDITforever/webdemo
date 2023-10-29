

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="Cssfile/style.css">
  <link rel="stylesheet" href="Cssfile/userinfo.css">
  <link rel="icon" href="imgg/loggo.png" />
  <link rel="stylesheet" href="source font/fontawesome/fontawesome/css/all.min.css" />
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
          <div class="element1">
            <div class="BoxforInfo">
              <div class="UpperBox">
                <div class="ImgandName">
                  <img id="image" src="<?php echo $image ?>" />
                  <div class="file-upload">
                    <label class="custom-file-upload">
                      Tải ảnh
                      <i class="fa-solid fa-pen"></i>
                    </label>
                    <input id="file-input" type="file" accept="image/jpg, image/jpeg,image/png">
                  </div>
                  <p>
                    <?php echo "$useraddress" ?>
                  </p>
                </div>
              </div>
              <div class="BoxUnder">
                <form class="formchange">
                  <div class="elemetninform">
                    <label for="username">Tên</label>
                    <input type="text" name="username" id="username" value="<?php echo $userName ?>" autocomplete="none"
                      required />
                  </div>
                  <div class="elemetninform">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="tel" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber ?> "
                      required />
                  </div>
                  <div class="elemetninform">
                    <label for="username">Email</label>
                    <input type="text" name="userEmail" id="useremail" value="<?php echo "$userEmail" ?>" required />
                  </div>
                  <div class="elemetninform">
                    <label for="username">Địa chỉ</label>
                    <input type="text" name="username" id="address" value="<?php echo "$useraddress" ?>" required />
                  </div>
                  <div class="btnupdate1">
                    <button type="submit" class="btnupdateprofile">Cập nhật</button>
                  </div>
                  <div class="btnupdate2">
                    <button type="button" class="btncancle">Hủy</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="BoxforInfo">
              <div class="UpperBox">
                <div class="ImgandName">
                  <img src="<?php echo "$image" ?>" />
                </div>
              </div>
              <div class="BoxUnder">
                <h3>Thay đổi mật khẩu</h3>
                <?php
                if (isset($message)) {
                  foreach ($message as $message) {
                    echo '<div>' . $message . '</div>';
                  }
                }
                ;
                ?>
                <form class="formchange2" action="" method="post">
                  <div class="elemetninform">
                    <label for="">
                      Mật khẩu cũ<span>*</span>
                    </label>
                    <input type="text" name="currentpasss" id="currentpasss" placeholder="Nhập mật khẩu cũ" />
                  </div>
                  <div class="elemetninform">
                    <label for="username">
                      Mật khẩu mới
                    </label>
                    <input type="password" name="newpass" id="newpass" placeholder="Nhập mật khẩu mới" />
                  </div>
                  <div class="elemetninform">
                    <label for="cnewpass">
                      Xác nhận mật khẩu mới<span>*</span>
                    </label>
                    <input type="password" name="cnewpass" id="cnewpass" placeholder="Xác nhận mật khẩu mới" />
                  </div>
                  <div class="btnupdate1">
                    <button type="submit" name="submit">Cập nhật</button>
                  </div>
                  <div class="btnupdate2">
                    <button type="button">
                      Hủy
                    </button>
                  </div>

                </form>
              </div>
            </div>
            <div class="BoxforInfo">
              <div class="history_table">
                <table class="styled-table">
                  <thead>
                    <tr>
                      <th>Thời gian</th>
                      <th>Mô tả</th>
                      <th>Cấp bậc/Môn</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql2 = "SELECT * FROM `history_down` WHERE id_user = '$user_id'";
                    $statement = $con->prepare($sql2);
                    $statement->execute();
                    $row2 = $statement->fetchAll();
                    ?>
                    <?php
                    foreach ($row2 as $row2) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $row2['time'] ?>
                        </td>
                        <td>
                          <p class="decrip_test" title="<?php echo $row2['decrip'] ?>">
                            <?php echo $row2['decrip'] ?>
                          </p>
                        </td>
                        <td>
                          <?php echo $row2['rank'] ?>
                        </td>
                      </tr>
                    <?php } ?>

                </table>
              </div>

            </div>
          </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="fileJS/userinfo.js"></script>
</body>

</html>