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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Learn and learn</title>
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
          <div class="contain-wothpt">
          <div class="wordd">
            <h1>Đề thi THPT quốc gia và đáp án</h1>
            <p>Tổng hợp Đề thi THPT Quốc gia và lời giải nhanh và chính xác nhất</p>
          </div>
          <div class="picthpt">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/013/651/730/original/animated-studying-friends-characters-group-of-classmates-full-body-flat-people-hd-footage-with-alpha-channel-color-cartoon-style-illustration-on-transparent-background-for-animation-video.jpg" alt="">
          </div>
          </div>
         
          <p>có 4289 tài liệu</p>
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
                    <a data-id-exam="<?php echo $row['id']?>">Review</a>
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
    <?php include "./ElementForMainpage/Footer.php" ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="fileJS/style.js"></script>
  <script src="fileJS/12tocollege.js"></script>
</body>

</html>