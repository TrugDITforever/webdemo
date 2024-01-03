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
              <li class="user-accbtn"><i class="fa-solid fa-user-group"></i><a>Tài khoản người dùng</a></li>
              <li class="user-profile"><i class="fa-solid fa-address-card"></i><a>Bài đăng người dùng</a></li>
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
              <!-- <div class="header_table">
                <table class="styled-table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên đăng nhập</th>
                      <th>Mật khẩu</th>
                      <th>Tên người dùng</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                </table>
              </div> -->
              <div class="content_table">
                <table class="styled-table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên đăng nhập</th>
                      <th>Mật khẩu</th>
                      <th>Tên người dùng</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $rows = getUserac();
                    foreach ($rows as $row) {
                    ?>
                      <tr>
                        <td class="id_useracc">
                          <?php echo $row['id_user']; ?>
                        </td>
                        <td>
                          <?php echo $row['username']; ?>
                        </td>
                        <td>
                          <?php echo $row['password']; ?>
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
                          <?php echo $row['phonenumber']; ?>
                        </td>
                        <td>
                          <?php echo $row['email']; ?>
                        </td>
                        <td>
                          <!-- <span class="editacc"><i class="fa-regular fa-pen-to-square"></i>Sửa</span> -->
                          <?php 
                            $access= $row['access'];
                            if($access == 1){
                              echo '<span class="delacc adminpost-btn-useracc-delete"><i class="fa-regular fa-trash-can"></i><span class="del-wo">Chặn</span></span>';
                            }else if($access == 0)  {
                              echo '<span class="delacc adminpost-btn-useracc-delete"><i class="fa-regular fa-trash-can"></i><span class="del-wo">Bỏ chặn</span></span>';
                            }
                            ?>
                          
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
            <div>
              <?php
              $row = getUserpost();
              $reversedArray = array_reverse($row);
              foreach ($reversedArray as $row) :
              ?>
                <div class="containerPost">
                  <div class="box1">
                    <div class="pic1">
                      <ul>
                        <li>
                          <a data-post-id="<?php echo $row['id'] ?>">
                            <img width="40px" src="<?php echo 'uploadfile/'.$row['imguser']?>" alt="" />
                            <?php echo $row['nameuser'] ?>
                          </a>
                        </li>
                        <li class="space">
                          <a>
                            <?php echo $row['subject'] ?>
                          </a>
                        </li>
                        <li class="space">
                          <a> 1 giờ trước </a>
                        </li>
                        <li class="space hover-submenu">
                          <a> <img src="./imgg/ellipsis.png"></a>
                          <ul class="small-submenu">                     
                            <li class="deletepost"><i class="fa-solid fa-trash-can"></i>&nbspXóa bài</li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="comment1">
                      <p>
                        <?php echo $row['cmtStatus'] ?>
                      </p>
                      <a>
                        <img src="https://2.bp.blogspot.com/-N5M0I9_1tks/XkElu5uQXII/AAAAAAAAARs/s6sQJXhXzC8CtdmKO3dNv9wKnMAsodQBwCLcBGAsYHQ/s1600/trac-nghiem-gioi-han-1.png" alt="" />
                      </a>

                    </div>
                  </div>
                 
                  <div class="Container-user-comment">
                    <h5 class="word-usercommet">Bình luận của người dùng:</h5>
                  <?php 
                 $rowForUserPost = getPost_commentbyId($row['id']);
                 if(!empty($rowForUserPost)){
                 foreach ($rowForUserPost as $row):
                  ?>
                  <div class="User-comment-contain">
                    <div class="user-comment-info">
                      <div class="user-comment-pic">
                        <img src="./uploadfile/<?php 
                        if(!empty($row['img'])){
                          echo $row['img'];
                        }
                          ?>" alt="">
                      </div>
                      <div class="user-comment-name-container">
                        <div class="user-comment-name" data-id-cmt="<?php echo $row['id'] ?>" >
                          <div>
                          <span class="cmt-del-btn"style="color: red;"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</span>
                          </div>
                          <h4><?php echo $row['username']?> 
                        </h4>
                          <span><?php echo $row['comment']?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                   <?php
                   endforeach;
                  }
                   ?>
                  </div>
                </div>
              <?php
              endforeach;
              ?>
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
      <h4><i class="fa-solid fa-triangle-exclamation" style="color: #f0e800;"></i>Chắc chắn hành động này!</h4>
      <div class="confirm-button">
        <button type="button" class="mark button secondary-button mr-12 adminpost-confirm">Xác nhận</button>
        <button type="button" class="mark button primary-button adminpost-cancel">Hủy</button>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="fileJS/adminpage.js"></script>
  <script src="fileJS/adminfunctionjs/adminpost.js"></script>
</body>

</html>