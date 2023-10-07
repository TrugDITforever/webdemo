
<?php 
session_start();
require_once("Controllerr/studyController.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Cssfile/style.css" />
  <link rel="icon" href="imgg/loggo.png" />
  <link rel="stylesheet" href="source font/fontawesome/fontawesome/css/all.min.css" />
  <title>LEARN AND LEARN</title>
</head>
<body>
  <div>
    <?php include "ElementForMainpage/header.php"; ?>
  </div>
  <div class="container">
    <div class="ads"></div>

    <div class="main">
      <div class="arrow">
        <a href="#">
          <i class="fa-solid fa-arrow-up fa-2xl"></i>
        </a>
      </div>
      <?php include "ElementForMainpage/tabmain.php"; ?>
      <div class="infor">
        <div class="outsideloginplace">
          <?php include "ElementForMainpage/login-signup.php" ?>
        </div>

        <div class="ask">
          <a> <img src="imgg/team.png" alt="" />HỎI VÀ ĐÁP </a>
        </div>
        <div class="under-ask">
          <div class="ask-box">
            <form id="search-form" action="">
                <input id="ask-place" type="text" placeholder="Tìm kiếm môn học...... " required />
                <a >
                  <i class="fa-solid fa-magnifying-glass"></i>
                </a>
              <!-- <input type="submit" value="Search" /> -->
            </form>
          </div>
          <div class="btnpost">
          <button class="post-button">Đăng bài</button>
          </div>
        </div>
        <?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject =filter_input(INPUT_POST,"subject-status");
    $decrip = filter_input(INPUT_POST,"decrip-status");
    // $userimg = $_FILES["file-status"]["name"];
    // $image_folder = "uploadfile/$userimg";
    // move_uploaded_file($_FILES["file-status"]["tmp_name"], $image_folder);
    poststatus($subject, $decrip);
}
?>
<?php 
$row =getcmtstatus();
foreach($row as $row){
?>
        <div class="box1">
          <div class="pic1">
            <ul>
              <li>
                <a>
                  <img width="40px" src="imgg/team.png" alt="" />
                  <?php echo $row['nameuser']?>
                </a>
              </li>
              <li class="space">
                <a > <?php echo $row['subject']?> </a>
              </li>
              <li class="space">
                <a > 1 giờ trước </a>
              </li>
            </ul>
          </div>
          <div class="comment1">
            <p><?php echo $row['cmtStatus']?></p>
            <a>
              <img
                src="https://2.bp.blogspot.com/-N5M0I9_1tks/XkElu5uQXII/AAAAAAAAARs/s6sQJXhXzC8CtdmKO3dNv9wKnMAsodQBwCLcBGAsYHQ/s1600/trac-nghiem-gioi-han-1.png"
                alt="" />
            </a>

          </div>
          <div class="place_tolike">
            <ul>
              <li><i class="fa-solid fa-heart"></i>Thích</li>
              <li><i class="fa-regular fa-comment"></i>Trả lời</li>
              <li><i class="fa-regular fa-share-from-square"></i>Chia sẻ</li>
            </ul>
          </div>
        </div>

      <?php
}
      ?>
        <!-- <div class="box1">
          <div class="pic1">
            <ul>
              <li>
                <a>
                  <img width="40px" src="imgg/team.png" alt="" />
                  Tạ Quang Anh
                </a>
              </li>
              <li class="space">
                <a> Hóa học </a>
              </li>
              <li class="space">
                <a> 15 giờ trước </a>
              </li>
            </ul>
          </div>
          <div class="comment1">
            <p>Có thể giúp em giải bài 2,3,4 được không ạ!!</p>
            <a>
              <img src="https://i.vdoc.vn/data/image/2023/03/07/16781982969496425815228314447288.jpg" alt="" />
            </a>
          </div>
          <div class="place_tolike">
            <ul>
              <li><i class="fa-solid fa-heart "></i>Thích</li>
              <li><i class="fa-regular fa-comment"></i>Trả lời</li>
              <li><i class="fa-regular fa-share-from-square"></i>Chia sẻ</li>
            </ul>
          </div>
        </div>
        <div class="box1">
          <div class="pic1">
            <ul>
              <li>
                <a>
                  <img width="40px" src="imgg/team.png" alt="" />
                  Nguyễn Việt Hưng
                </a>
              </li>
              <li class="space">
                <a href=""> Toán học </a>
              </li>
              <li class="space">
                <a href=""> 1 giờ trước </a>
              </li>
            </ul>
          </div>
          <div class="comment1">
            <p>Em đang cần gấp đáp án cho bài dưới này ạ!!</p>
            <a>
              <img
                src="https://api.toploigiai.vn/uploads/anh-bai-viet/giai-toan-11-nang-cao/chuong-4-dai-so-va-giai-tich/giai-toan-11-nang-cao-bai-59-trang-178-dai-so-va-giai-tich.png"
                alt="" />
            </a>
          </div>
          <div class="place_tolike">
            <ul>
              <li><i class="fa-solid fa-heart"></i>Thích</li>
              <li><i class="fa-regular fa-comment"></i>Trả lời</li>
              <li><i class="fa-regular fa-share-from-square"></i>Chia sẻ</li>
            </ul>
          </div>
        </div>
        <div class="box1">
          <div class="pic1">
            <ul>
              <li>
                <a>
                  <img width="40px" src="imgg/team.png" alt="" />
                  Trần Bảo Quân
                </a>
              </li>
              <li class="space">
                <a href=""> Vật Lí </a>
              </li>
              <li class="space">
                <a href=""> 15 giờ trước </a>
              </li>
            </ul>
          </div>
          <div class="comment1">
            <p>Giải thích bài dưới giúp em với ạ!!</p>
            <a>
              <img
                src="https://assets.isu.pub/document-structure/221220100117-2285af387a32251e38e80d8589d7bfb5/v1/dcef8b126499e96486dbff629acf0020.jpeg"
                alt="" />
            </a>
          </div>
          <div class="place_tolike">
            <ul>
              <li><i class="fa-solid fa-heart"></i>Thích</li>
              <li><i class="fa-regular fa-comment"></i>Trả lời</li>
              <li><i class="fa-regular fa-share-from-square"></i>Chia sẻ</li>
            </ul>
          </div>
        </div>
        <div class="box1">
          <div class="pic1">
            <ul>
              <li>
                <a>
                  <img width="40px" src="imgg/team.png" alt="" />
                  Nguyễn Việt Hưng
                </a>
              </li>
              <li class="space">
                <a href=""> Toán học </a>
              </li>
              <li class="space">
                <a href=""> 1 giờ trước </a>
              </li>
            </ul>
          </div>
          <div class="comment1">
            <p>Em đang cần gấp đáp án cho bài dưới này ạ!!</p>
            <a>
              <img
                src="https://api.toploigiai.vn/uploads/anh-bai-viet/giai-toan-11-nang-cao/chuong-4-dai-so-va-giai-tich/giai-toan-11-nang-cao-bai-59-trang-178-dai-so-va-giai-tich.png"
                alt="" />
            </a>
          </div>
          <div class="place_tolike">
            <ul>
              <li><i class="fa-solid fa-heart"></i>Thích</li>
              <li><i class="fa-regular fa-comment"></i>Trả lời</li>
              <li><i class="fa-regular fa-share-from-square"></i>Chia sẻ</li>
            </ul>
          </div>
        </div> -->
        <div class="line"></div>
        <div class="reward">
          <div class="iconre1">
            <img src="imgg/cup.png" alt="" />
          </div>
          <div class="reward-word">
            <h1>BẢNG VINH DANH</h1>
          </div>
          <div class="iconre2">
            <img src="imgg/cup.png" alt="" />
          </div>
        </div>
        <div class="board">
          <div class="peo1">
            <img src="https://image.baogialai.com.vn/w840/dataimages/202207/original/images3171534_1.jpg" alt="" />
            <h3>Dương Khánh Linh</h3>
            <h5>Toán: 9.5 Văn: 8.75 Anh: 9.5</h5>
          </div>
          <div class="peo1">
            <img
              src="https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/8/14/thu-khoa-1-7362-1660496226790395256435.jpg"
              alt="" />
            <h3>Trần Bảo Quân</h3>
            <h5>Toán: 8.75 Lí: 9.5 Anh: 9</h5>
          </div>
          <div class="peo1">
            <img
              src="https://static-images.vnncdn.net/files/publish/2022/8/23/z3664276784589-48b7f9aab1e867d6167f6dc60c6a0f88-1-112.jpg"
              alt="" />
            <h3>Nguyễn Bảo Ngọc</h3>
            <h5>Văn: 9 Sử: 9.5 Địa: 9.5</h5>
          </div>
          <div class="peo1">
            <img
              src="https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/8/14/thu-khoa-1-7362-1660496226790395256435.jpg"
              alt="" />
            <h3>Trần Chí Khanh</h3>
            <h5>Toán: 8.75 Lí: 9.5 Anh: 9</h5>
          </div>
          <div class="peo1">
            <img
              src="https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/8/14/thu-khoa-1-7362-1660496226790395256435.jpg"
              alt="" />
            <h3>Trần Hoàng Quân</h3>
            <h5>Toán: 8.75 Lí: 9.5 Anh: 9</h5>
          </div>
          <div class="peo1">
            <img
              src="https://static-images.vnncdn.net/files/publish/2022/8/23/z3664276784589-48b7f9aab1e867d6167f6dc60c6a0f88-1-112.jpg"
              alt="" />
            <h3>Dương Khánh Ly</h3>
            <h5>Văn: 9 Sử: 9.5 Địa: 9.5</h5>
          </div>
          <div class="peo1">
            <img
              src="https://static-images.vnncdn.net/files/publish/2022/8/23/z3664276784589-48b7f9aab1e867d6167f6dc60c6a0f88-1-112.jpg"
              alt="" />
            <h3>Nguyễn Quỳnh Nga</h3>
            <h5>Văn: 9 Sử: 9.5 Địa: 9.5</h5>
          </div>
          <div class="peo1">
            <img
              src="https://static-images.vnncdn.net/files/publish/2022/8/23/z3664276784589-48b7f9aab1e867d6167f6dc60c6a0f88-1-112.jpg"
              alt="" />
            <h3>Đặng Quang Phúc</h3>
            <h5>Văn: 9 Sử: 9.5 Địa: 9.5</h5>
          </div>
        </div>
        <div class="customer-cmt">
          <div class="cmt-word">
            <div class="word-comment">
              <p>Bình Luận</p>
            </div>
          </div>
          <div class="place-cmt">
            <div class="box-cmt">
              <img src="imgg/user.png" alt="" />
              <input type="text" placeholder="Viết bình luận tại đây..." />
              <button id="comment-button">Đăng</button>
            </div>
            <div class="cmt-container">
              <div class="people-cmt">
                <div>
                  <img src="https://thuthuatnhanh.com/wp-content/uploads/2019/02/anh-dai-dien-dep-cho-zalo.jpeg"
                    alt="" />
                </div>
                <div class="name-cmt">
                  <p>Linh</p>
                  <p>Bài giải hay quá</p>
                </div>
              </div>
              <div class="people-cmt">
                <div>
                  <img src="https://top10dienbien.com/wp-content/uploads/2022/10/avatar-cute-11.jpg" alt="" />
                </div>
                <div class="name-cmt">
                  <p>Lê Nhã</p>
                  <p>Các dạng đề khá hay</p>
                </div>
              </div>
              <div class="people-cmt">
                <div>
                  <img src="https://freenice.net/wp-content/uploads/2021/08/hinh-anh-avatar-dep.jpg" alt="" />
                </div>
                <div class="name-cmt">
                  <p>Anh Quang</p>
                  <p>Bài giải hay quá</p>
                </div>
              </div>
              <div class="people-cmt">
                <div>
                  <img src="https://haycafe.vn/wp-content/uploads/2021/11/Anh-avatar-dep-chat-lam-hinh-dai-dien.jpg"
                    alt="" />
                </div>
                <div class="name-cmt">
                  <p>No Name</p>
                  <p>Cảm ơn add nhiều nhé! Tài liệu rất có giá trị.</p>
                </div>
              </div>
              <div class="people-cmt">
                <div>
                  <img src="imgg/user.png" alt="" />
                </div>
                <div class="name-cmt">
                  <p>Ngọc Bảo</p>
                  <p>Trang web khá hay, bổ ích</p>
                </div>
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
            <input type="text" id=" " name="username" required />
            <label for="decrip">Ảnh nhóm:</label>
            <input type="file" id="decrip" required />
            <label for="decrip">Thành viên:</label>
            <input type="text" id="" name="decrip" required placeholder="Nhập email của thành viên" />
          </div>
          <input id="signup-btn" type="submit" value="Tạo Nhóm" />
        </form>
      </div>

 
      <div class="Post-create">
        <i class="fa-solid fa-circle-xmark" id="close4"></i>
        <form method="post" enctype="multipart/form-data">
          <h4 style="
                margin: 0px;
                padding: 4px 0;
                color: #4285f4;
                font-size: 24px;
                font-weight: 700;
                text-transform: uppercase;
              ">
            Tạo bài viết
          </h4>
          <div class="status-form">
            <label>Môn học:</label>
            <input type="text" name="subject-status" required />
            <label>Mô tả:</label>
            <input type="text" name="decrip-status" required placeholder="Thêm mô tả tại đây..." />
            <label class="add-img">Thêm ảnh:<i class="fa-solid fa-images" style="color: #04ff00;"></i></label>
            <input type="file" name="file-status"class="input-hidden" required />
            <div class="place-img-select">
              <a class="del-img-status"><i class="fa-regular fa-circle-xmark"></i></a>
              <img class="img-status" src="">
            </div>
          </div>
          <input id="post-btn" type="submit" value="Đăng" />
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

  <!-- searching form -->
  <script>
    const searchForm = document.getElementById("search-form");
    const boxes = document.querySelectorAll(".box1");
    const searchInput = document.getElementById("ask-place");
    searchInput.addEventListener("input", function () {
      const searchTerm = searchInput.value.toLowerCase();
      boxes.forEach(function (box) {
        const subject = box.querySelector("li.space:nth-child(2) a").textContent.toLowerCase();
        if (subject.includes(searchTerm) || searchTerm === "") {
          box.style.display = "block";
        } else {
          box.style.display = "none";
        }
      });
    });
  </script>
</body>

</html>