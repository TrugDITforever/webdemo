<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Cssfile/style.css" />
  <link rel="stylesheet" href="Cssfile/12toCollege.css" />
  <link rel="icon" href="imgg/loggo.png" />

  <link rel="stylesheet" href="source font/fontawesome/fontawesome/css/all.min.css" />
  <title>LEARN AND LEARN</title>
</head>

<body>
  <?php include "ElementForMainpage/header.php"; ?>
  <div class="container">
    <div class="ads"></div>

    <div class="main">
      <div class="arrow">
        <a href="#login-place" href="#">
          <i class="fa-solid fa-arrow-up fa-2xl"></i>
        </a>
      </div>
      <?php include "ElementForMainpage/tabmain.php" ?>

      <div class="infor">
        <div class="outsideloginplace">
          <?php include "ElementForMainpage/login-signup.php" ?>
        </div>
        <!-- //start here -->
        <div class="all">
          <div class="wordd">
            <h1>Đề thi THPT quốc gia</h1>
            <p>có 4289 tài liệu</p>
          </div>
          <div class="placefortest">
            <?php
            $row = getExamtests();
            ?>
            <?php
            foreach ($row as $row) {
            ?>
              <div class="box">
                <div class="test_name">
                  <p>
                   <?php echo $row['decrip'] ?>
                  </p>
                </div>
                <div class="title">
                 <p> <i class="fa-regular fa-folder-open"> </i><span><?php echo $row["subject"] ?></span>, Đề thi THPT quốc gia</p>
                </div>
                <div class="eyeandown">
                  <div class="eye">
                    <i class="fa-solid fa-eye"></i><span>8296</span>
                  </div>
                  <div class="downn">
                    <i class="fa-solid fa-download"></i> <span>4002</span>
                  </div>
                </div>
                <div class="author">
                  <i class="fa-solid fa-user fa-xl" style="color: #b7c6e1"></i>
                  <span>Tác Giả</span>
                </div>
                <div class="hidden">
                  <div class="read">
                    <a>Review</a>
                  </div>
                  <div class="btndown">
                    <a class="down_test" href="./powerpoint/cources.txt" download="">Download</a>
                  </div>
                </div>
              </div>

            <?php
            }
            ?>

          </div>
        </div>
        <!-- end here -->
      </div>
      <div class="review">
        <div class="test">
          <img src="https://toanmath.com/wp-content/uploads/2022/07/de-thi-chinh-thuc-ky-thi-tot-nghiep-thpt-nam-2022-mon-toan.png" alt="" />
        </div>
        <div class="test">
          <img src="https://hou.edu.vn/files/anhbaiviet/Images/2019/Thang_06/Dap%20an%20Van%20THPT/Dap%20an%20Van%202019%20p1.png" alt="" />
        </div>
        <div class="test">
          <img src="https://media.kenhtuyensinh.vn/images/cms/2019/06/de-thi-mon-hoa-thpt-2019.png" alt="" />
        </div>
        <div class="test">
          <img src="https://tailieuhoctap.edu.vn/wp-content/uploads/2022/07/de-thi-ly-2019.jpg" alt="" />
        </div>
      </div>
      <div class="last">
        <?php include "./ElementForMainpage/Group.php" ?>
      </div>
      <?php include "./ElementForMainpage/GroupCreate.php" ?>
      <div class="alert">
        <div class="alertword">
          <p>Bạn cần đăng nhập vào để xem tài liệu này</p>
          <a>
            <i class="fa-solid fa-xmark"></i>
          </a>
        </div>
      </div>



 
    </div>
   <?php  include "./ElementForMainpage/Footer.php"?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="fileJS/style.js"></script>
  <script src="fileJS/12tocollege.js"></script>
</body>
</html>