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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
              <!-- <li class="user-accbtn"><i class="fa-solid fa-user-group"></i><a>Tài khoản người dùng</a></li> -->
              <!-- <li class="user-profile"><i class="fa-solid fa-address-card"></i><a>Hồ sơ người dùng</a></li> -->
              <li class="btn-test"><i class="fa-brands fa-dochub"></i><a>Đề thi THPT QG</a></li>
              <li class="btn-test9to10"><i class="fa-brands fa-dochub"></i><a>Đề thi 9 lên 10</a></li>
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
                      <th>Ảnh</th>
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
                        <td class="decrip-img">
                          <?php echo $row['imgtest']; ?>
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
                      <th>Ảnh</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="content_table">
                <table class=" styled-table ">
                  <tbody class="tablecontent">
                    <?php
                    $row3 = gettest9to10();
                    foreach ($row3 as $row) {
                    ?>
                      <tr class="styled-table-tr">
                        <td class="id-subject">
                          <?php echo $row['id']; ?>
                        </td>
                        <td class="decrip-img">
                          <?php echo $row['imgtest']; ?>
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
            <select name="subject-status" class="name-subject">
              <option value="Toán học">Toán học</option>
              <option value="Ngữ văn">Ngữ văn</option>
              <option value="Tiếng anh">Tiếng anh</option>
              <option value="Hóa học">Hóa học</option>
              <option value="Vật lí">Vật lí</option>
              <option value="Sinh học">Sinh học</option>
              <option value="Địa lí">Địa lí</option>
              <option value="Lịch sử">Lịch sử</option>
              <option value="GDCD">GDCD</option>
            </select>
            <label for="">Ảnh tài liệu:</label>
            <div class="inputfile-container">
            <div class="custom-file-upload">
                     Chọn ảnh
                      <i class="fa-solid fa-pen"></i>
            </div>
                    <input id="file-input" type="file" accept="image/jpg, image/jpeg,image/png" required>
                  </div>
                  <span class="name-file-subject"></span>
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
  <script src="fileJS/adminfunctionjs/admindoc.js"></script>

</body>

</html>