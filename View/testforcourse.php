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
  <title>LEARN AND LEARN</title>
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
         <?php if( isset($_GET['name'])){
          $name_grade = $_GET['name'];
         }
          ?>
          <div class="mathplace" id="math">
            <div class="matthwo">
              <h1>Môn Toán</h1>
            </div>
            <div class="courceplace">
              <div class="courcewwo">
                <h1><?php echo $name_grade?></h1>
              </div>
              <div class="cources">
                <?php $row = renderClass();
                foreach ($row as $row):
                ?>
                <div class="class">
                  <div class="classwwo" style="
                        background-image: url(https://eduvoice.in/wp-content/uploads/2019/05/Feature-Image.jpg);
                      "></div>
                  <p>Đề ôn luyện được chọn lọc và tham khảo</p>
                  <div class="nameclass">
                    <p><?php echo $row['nameClass']?></p>
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
                        <a class="down" href="./powerpoint/cources.txt"><span>Tải Xuống!</span></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach;?>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="last">
        <div>
          <div class="create">
            <p>Tạo nhóm để học cùng nhau nhé!!!</p>
            <button class="btngroup">
              <a>
                <i class="fa-solid fa-circle-plus"></i>
                Tạo Nhóm
              </a>
            </button>
            <p>Nhóm phổ biến gần đây.</p>
          </div>
          <div class="group-main">
            <div class="group">
              <div class="group-img">
                <div style="width: 50%; margin-right: 10px">
                  <a>
                    <img
                      src="https://xcdn-cf.vuihoc.vn/upload/5c209fe6176b0/2022/04/06/097a_khoi-d-gom-nhung-nganh-nao-1.png"
                      alt="" />
                  </a>
                </div>
                <div style="
                      display: flex;
                      justify-content: center;
                      align-items: center;
                    ">
                  <span>Nhóm khối D</span>
                </div>
              </div>
              <div class="gr-btn">
                <button>Tham Gia Ngay</button>
              </div>
            </div>
            <div class="group">
              <div class="group-img">
                <div style="width: 50%; margin-right: 10px">
                  <a>
                    <img src="https://static.ybox.vn/2020/12/1/1607335958957-lam-viec-nhom-hieu-qua.jpg" alt="" />
                  </a>
                </div>
                <div style="
                      display: flex;
                      justify-content: center;
                      align-items: center;
                    ">
                  <span>TeamWork</span>
                </div>
              </div>
              <div class="gr-btn">
                <button>Tham Gia Ngay</button>
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
      <div class="group-create">
        <i class="fa-solid fa-circle-xmark" id="close3"></i>
        <form>
          <h4 style="
                margin: 0px;
                padding: 4px 0;
                color: #4285f4;
                font-size: 24px;
                font-weight: 700;
                text-transform: uppercase;
              ">
            TẠO NHÓM
          </h4>
          <div class="login-form" id="loginform">
            <label for="username">Tên Nhóm:</label>
            <input type="text" id="username" name="username" required />
            <label for="decrip">Ảnh nhóm:</label>
            <input type="file" id="" required />
            <label for="decrip">Thành viên:</label>
            <input type="text" id="" name="decrip" required placeholder="Nhập email của thành viên" />
          </div>
          <input id="login-btn" type="submit" value="Tạo Nhóm" />
        </form>
      </div>
    </div>
    <footer>
      <div class="footer" id="footer">
        <div class="last-page">
          <div class="place-for-ad" id="contact">
            <div class="main-word" style="color: white">
              <a href="#">
                <img src="imgg/logo.png" alt="logo" />
                LEARN X2
              </a>
              <p>
                Trang web gồm những khóa học hay cho các bạn từ lớp 1 đến lớp
                12. Môi trường trao đổi kiến thức trực tuyến. Đa dạng các hội
                nhóm. Cơ hội hợp tác cùng các bạn mới ra trường. Các dạng đề
                ôn luyện thường xuyên được cập nhật.
              </p>
              <p1><strong>HỌC - HỌC NỮA - HỌC MÃI</strong></p1>
            </div>
          </div>
          <div class="privacy">
            <p>CHÍNH SÁCH</p>
            <ul>
              <li>Chính sách bảo mật</li>
              <li>Chính sách đổi trả</li>
              <li>Tuyển dụng</li>
            </ul>
          </div>
          <div class="contact-menu">
            <p>Liên hệ với chúng tôi</p>
            <ul>
              <li>
                <a href="">
                  <img src="imgg/facebook.png" alt="" />
                  https://www.facebook.com/learnx2
                </a>
              </li>
              <li>
                <a href="">
                  <img src="imgg/gmail.png" alt="" />
                  learnx2.vn@gmail.com
                </a>
              </li>
              <li style="color: white">
                <img src="imgg/telephone-call.png" alt="" />
                0911163579
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="copyright">
        <p>
          Copyright &copy; 2023 <span>VKU-Coder.</span>All Rights Reserved.
        </p>
      </div>
    </footer>
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