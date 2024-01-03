<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Cssfile/style.css" />
  <link rel="stylesheet" href="Cssfile/testforcource.css" />
  <link rel="icon" href="imgg/loggo.png" />
  <link rel="stylesheet" href="source font/fontawesome/fontawesome/css/all.min.css" />
  <title>Learn and learn</title>

</head>

<body>
  <?php include "ElementForMainpage/header.php"; ?>
  <div class="container">
    <div class="ads"></div>
    <div class="main">
      <div class="arrow">
        <a href="#login-place">
          <i class="fa-solid fa-arrow-up fa-2xl"></i>
        </a>
      </div>
      <?php include "ElementForMainpage/tabmain.php"; ?>
      <div class="infor">
        <div class="outsideloginplace">
          <?php include "ElementForMainpage/login-signup.php" ?>

        </div>
        <!-- //start here -->
        <div class="suround">
          <div class="imagewelcome">
            <div class="slideshowsliders">
              <div class="slide" style="
                    background-image: url(https://thuthuatnhanh.com/wp-content/uploads/2022/06/Hinh-anh-hoc-tap-chill.jpg);
                  "></div>
              <div class="slide" style="
                    background-image: url(https://i.pinimg.com/originals/a7/f7/0b/a7f70b0e09b4e48ded3a11786d583385.png);
                  "></div>
              <div class="slide" style="
                    background-image: url(https://images.unsplash.com/photo-1585832770485-e68a5dbfad52?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c3R1ZHklMjBkZXNrfGVufDB8fDB8fHww&w=1000&q=80);
                  "></div>
            </div>
          </div>
          <div class="menucource">
            <ul>
              <li>
                <a href="#subject=math">TOÁN</a>
              </li>
              <li>
                <a href="#vietnamese">TIẾNG VIỆT</a>
              </li>
              <li>
                <a href="">NGỮ VĂN</a>
              </li>
              <li>
                <a href="">TIẾNG ANH</a>
              </li>
              <li>
                <a href="">VẬT LÍ</a>
              </li>
              <li>
                <a href="">HÓA HỌC</a>
              </li>
              <li>
                <a href="">SINH HỌC</a>
              </li>
              <li>
                <a href="">LỊCH SỬ</a>
              </li>
              <li>
                <a href="">ĐỊA LÍ</a>
              </li>
              <li>
                <a href="">GIÁO DỤC CÔNG DÂN</a>
              </li>
            </ul>
          </div>
          <?php if (isset($_GET['name'])) {
            $name_grade = $_GET['name'];
          }
          ?>
          <div class="mathplace" id="math">
            <div class="matthwo">
              <h1>Môn Toán</h1>
            </div>
            <div class="courceplace">
              <div class="courcewwo">
                <h1><?php echo $name_grade ?></h1>
              </div>
              <div class="cources">
                <?php $row = renderClass();
                foreach ($row as $row) :
                ?>
                  <div class="class">
                    <img class="classwwo" src="<?php echo $row["image"]?>"/>
                    <p>Đề ôn luyện được chọn lọc và tham khảo</p>
                    <div class="nameclass">
                      <p><?php echo $row['nameClass'] ?></p>
                    </div>
                    <div class="placetoodown">
                      <div class="arr2">
                        <ul>
                          <li><i class="fa-solid fa-chevron-right"></i></li>
                          <li><i class="fa-solid fa-chevron-right"></i></li>
                          <li><i class="fa-solid fa-chevron-right"></i></li>
                          <li><i class="fa-solid fa-chevron-right"></i></li>
                        </ul>
                      </div>
                      <div class="btndowwn">
                        <div class="btndoown">
                          <a class="down" href="./powerpoint/cources.txt" download><span>Tải Xuống!</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

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
  <script>
    let index = 0;
    displayImages();

    function displayImages() {
      let i;
      const images = document.getElementsByClassName("slide");
      for (i = 0; i < images.length; i++) {
        images[i].style.display = "none";
      }
      index++;
      if (index > images.length) {
        index = 1;
      }
      images[index - 1].style.display = "block";
      setTimeout(displayImages, 4000);
    }
  </script>
</body>

</html>