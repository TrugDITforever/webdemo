<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN-PAGE</title>
  <link rel="icon" href="imgg/loggo.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="source font/fontawesome/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="Cssfile/adminpage.css">
</head>

<body>
  <div class="Admin-page">
    <div class="contanier-admin">
      <div class="left-menu-admin">
        <div class="menu-admin">
          <div class="name-logo">
            <a><img src="imgg/loggo.png" alt="">Learnx2</a>
            <p><i class="fa-solid fa-lock"></i>This is page for admin</p>
          </div>
          <div class="list-menu">
            <ul>
              <li class="user-accbtn"><i class="fa-solid fa-user-group"></i><a>Tài khoản người dùng</a></li>
              <li class="user-profile"><i class="fa-solid fa-address-card"></i><a>Hồ sơ người dùng</a></li>
              <li class="btn-test"><i class="fa-brands fa-dochub"></i><a>Đề thi THPT QG</a></li>
            </ul>
            <!-- <a href="study.php">Đăng xuất</a> -->
          </div>
        </div>
      </div>
      <div class="right-page-admin">
        <div class="welcome-word">
          <div class="word-h1">
            <h1>Welcome, Admin<i class="fa-solid fa-hand-sparkles"></i></h1>
          </div>
          <div class="dropdown">
            <div class="admin-pic">
              <img src="https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg" alt="">
            </div>
            <button class="btn btn-secondary btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin demo<i class="fa-solid fa-arrow-down"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item " href="index?route=mainpage"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
            </div>
          </div>
        </div>
        <div class="placeShowlist">
          <div class="boxshowlist">
            <div class="title_page1">
              <p>Tài khoản người dùng</p>
              <div class="totaluser">
                <i class="fa-solid fa-users"></i> <span class="number-user">0</span>
              </div>
            </div>
            <div class="table-list">
              <div class="header_table">
                <table class="styled-table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên đăng nhập</th>
                      <th>Mật khẩu</th>
                      <th>Email</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="content_table">
                <table class="styled-table">
                  <tbody>
                    <?php
                    $rows = getUserac();
                    foreach ($rows as $row) {
                    ?>
                      <tr>
                        <td class="id_useracc">
                          <?php echo $row['id']; ?>
                        </td>
                        <td>
                          <?php echo $row['username']; ?>
                        </td>
                        <td>
                          <?php echo $row['password']; ?>
                        </td>
                        <td>
                          <?php echo $row['email']; ?>
                        </td>
                        <td><span class="editacc"><i class="fa-regular fa-pen-to-square"></i>Sửa</span>
                          <span class="delacc"><i class="fa-regular fa-trash-can"></i>Xóa</span>
                        </td>
                      </tr>

                    <?php
                    }
                    // } 
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="boxshowlist">
            <div class="title_page1">
              <p>Hồ sơ người dùng</p>
            </div>
            <div class="table-list">
              <div class="header_table">
                <table class="styled-table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên người dùng</th>
                      <th>Địa chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="content_table">
                <table class="styled-table">
                  <tbody>
                    <?php
                    $row = getUserProfile();
                    // if ($statement) {
                    foreach ($row as $row) {
                    ?>

                      <tr>
                        <td>
                          <?php echo $row['id_user']; ?>
                        </td>
                        <td class="username-pic">
                          <a>
                            <img src="<?php
                                      if ($row['img'] == "") {
                                        $image = "imgg/user.png";
                                        echo $image;
                                      } else {
                                        $image = 'uploadfile/' . $row['img'];
                                        echo $image;
                                      }
                                      ?>" alt="">
                            <?php echo $row['name']; ?>
                          </a>
                        </td>
                        <td>
                          <?php echo $row['address']; ?>
                        </td>
                        <td>
                          <?php echo $row['phonenumber']; ?>
                        </td>
                        <td><span class="editacc"><i class="fa-regular fa-pen-to-square"></i>Sửa</span>
                          <span class="delacc"><i class="fa-regular fa-trash-can"></i>Xóa</span>
                        </td>
                      </tr>
                    <?php
                      // }
                    } ?>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <div class="boxshowlist">
            <div class="title_page1">
              <p>Đề thi THPT</p>
              <div class="totaluser">
                <i class="fa-solid fa-file-circle-check"></i> <span class="number-doc">0</span>
              </div>
            </div>
            <div class="table-list">
              <div class="header_table">
                <table class="styled-table ">
                  <thead>
                    <tr>
                      <th>Mã số đề</th>
                      <th>Tên môn học</th>
                      <th>Mô tả</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="content_table">
                <table class=" styled-table ">
                  <tbody class="tablecontent">
                    <?php
                    $row3 = getExamtest();
                    foreach ($row3 as $row) {
                    ?>
                      <tr class="styled-table-tr">
                        <td class="id-subject">
                          <?php echo $row['id']; ?>
                        </td>
                        <td class="subject-word">
                          <?php echo $row['subject']; ?>
                        </td>
                        <td class="decrip-word">
                          <?php echo $row['decrip']; ?>
                        </td>
                        <td><span class="editacc insert-subject"><i class="fa-regular fa-pen-to-square"></i>Sửa</span>
                          <span class="delacc delete-subject"><i class="fa-regular fa-trash-can"></i>Xóa</span>
                        </td>
                      </tr>
                    <?php
                    } ?>
                  </tbody>
                </table>
              </div>

            </div>
            <div class="btn-inserttest">
              <button type="button"><i class="fa-solid fa-circle-plus fa-lg" style="color: #f0f2f4;"></i><a>Thêm tài
                  liệu</a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="blur-div">
        <div class="form-insert-test">
          <form class="form-insert">
            <i class="fa-solid fa-circle-xmark" style="color: #00e096;"></i>
            <h1>Cập nhật tài liệu</h1>
            <input class="hidden_id" type="text">
            <label for="">Tên môn học:</label>
            <input class="name-subject" type="text" required>
            <label for="">Chi tiết:</label>
            <textarea class="detail-text" resizeable="none" cols="30" rows="4" placeholder="Mô tả tài liệu tải lên..."></textarea>
            <button type="submit">
              Tải lên<i class="fa-solid fa-upload" style="padding-left:10px"></i>
            </button>
          </form>
        </div>
      </div>

    </div>
    <div class="confirm-whendelete">
      <h4><i class="fa-solid fa-triangle-exclamation" style="color: #f0e800;"></i>Bạn có chắc chắn muốn xóa!</h4>
      <div class="confirm-button">
        <button type="button" class="mark button secondary-button mr-12">Xác nhận</button>
        <button type="button" class="mark button primary-button">Hủy</button>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="fileJS/adminpage.js"></script>
</body>

</html>