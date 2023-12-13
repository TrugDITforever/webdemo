<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin_page</title>
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
              <li class="user-accbtn"><i class="fa-solid fa-user-group"></i><a>Tài khoản admin</a></li>
              <!-- <li class="user-profile"><i class="fa-solid fa-address-card"></i><a>Hồ sơ người dùng</a></li> -->
              <!-- <li class="btn-test"><i class="fa-brands fa-dochub"></i><a>Đề thi THPT QG</a></li> -->
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
              <a class="dropdown-item " href="index?route=admin"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
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
                      <th>Quyền truy cập</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="content_table">
                <table class="styled-table">
                  <tbody>
                    <?php
                    $rows = getAdminacc();
                    foreach ($rows as $row) {
                    ?>
                      <tr>
                        <td class="id_adminacc">
                          <?php echo $row['id']; ?>
                        </td>
                        <td class="admin_name">
                          <?php echo $row['adminname']; ?>
                        </td>
                        <td class="admin_pass">
                          <?php echo $row['password']; ?>
                        </td>
                        <td class="admin_role">
                          <?php echo $row['role']; ?>
                        </td>
                        <td><span class="editacc editadmin"><i class="fa-regular fa-pen-to-square"></i>Sửa</span>
                          <span class="delacc deladmin"><i class="fa-regular fa-trash-can"></i>Xóa</span>
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
            <div class="btn-inserttest adminbtn">
              <button type="button"><i class="fa-solid fa-circle-plus fa-lg" style="color: #f0f2f4;"></i><a>Thêm tài
              khoản</a></button>
            </div>
          </div>
          
        </div>
      </div>
      <div class="blur-div">
        <div class="form-insert-test">
          <form class="formInadmin">
            <i class="fa-solid fa-circle-xmark" style="color: #00e096;"></i>
            <h1>Cập nhật tài khoản</h1>
            <input class="id_admin" type="text">
            <span class="errorword" style="color: red"></span>
            <label>Tên đăng nhập:</label>
            <input class="adminname" type="text" required>
            <label >Mật khẩu:</label>
            <input class="adminpass" type="text" required>
            <label >Quyền truy cập:</label>
            <select class="adminaccess">
              <option value="admin">admin</option>
              <option value="admin_doc">admin_doc</option>
              <option value="admin_acc">admin_acc</option>

            </select>
            <button type="submit">
              <i class="fa-solid fa-upload" ></i>&nbspCập nhật
            </button>
          </form>
        </div>
      </div>

    </div>
    <div class="confirm-whendelete">
      <h4><i class="fa-solid fa-triangle-exclamation" style="color: #f0e800;"></i>Bạn có chắc chắn muốn xóa!</h4>
      <div class="confirm-button">
        <button type="button" class="mark button secondary-button mr-12 adminconfirm">Xác nhận</button>
        <button type="button" class="mark button primary-button admincancel">Hủy</button>
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