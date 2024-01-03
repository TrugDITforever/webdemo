<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Cssfile/style.css" />
  <link rel="stylesheet" href="Cssfile/class1.css" />
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
        <a href="#">
          <i class="fa-solid fa-arrow-up fa-2xl"></i>
        </a>
      </div>
      <!-- //* place for tab-main -->
      <?php include "ElementForMainpage/tabmain.php"; ?>
      <div class="infor">
        <div class="outsideloginplace">
          <?php include "ElementForMainpage/login-signup.php"; ?>
        </div>
        <!-- startherre -->
        <div class="wordsources">
          <a>TÀI LIỆU</a>
        </div>
        <div class="start">
          <?php if (isset($_GET['class'])) {
            $nameclass = $_GET['class'];
          ?>
            <h1>Giáo án PowerPoint tất cả các môn lớp <?php echo $nameclass ?></h1>
          <?php } ?>
        </div>
        <div class="body">
          <!-- this is place for code of div(ínidebody) -->

          <div class="Powerpoint" id="power1">
            <h1>Giáo án PowerPoint</h1>
          </div>
          <div class="underPowerpoint">
            <p>
              Chúng tôi đã biên soạn giáo án pp rất ngắn gọn, bám sát khung
              chương trình và đầy đủ lượng kiến thức cần truyền tải. Nhằm
              tránh trường hợp có thể gặp trục trặc trong kết nối mạng dẫn đến
              dạy không hết bài.
            </p>
          </div>
          <div class="Powerpoint" id="power2">
            <h1>Bộ giáo án PowerPoint gồm những gì?</h1>
          </div>
          <div class="underPowerpoint">
            <p>
              Bộ giáo án PowerPoint gồm tất cả các môn học từ tiểu học đến
              trung học cơ sở như: Toán, Tiếng Việt, Âm nhạc, Mỹ thuật …
            </p>
          </div>
          <div class="body2">
            <div class="wordprimary" id="th">
              <?php if (isset($_GET['class'])) {
                $nameclass = $_GET['class'];
              ?>
                <span>Lớp <?php echo $nameclass ?></span>
              <?php } ?>
            </div>
            <?php $row = DocumentRender();
            foreach ($row as $row) :
            ?>
              <div class="primary" id="l1">
                <div class="word1">
                  <p><?php echo $row["titledoc"] ?></p>
                </div>
                <!-- <div class="word2">
                  <p>Tải tài liệu miễn phí ở đây</p>
                </div> -->
                <div class="div-under">
                  <div class="placetodown">
                    <div class="iconimg">
                      <img src="imgg/powerpoint.png" alt="" />
                    </div>
                    <div class="nexttoicon">
                      <div class="wo">
                        <p><?php echo $row["titledoc"] ?></p>
                      </div>
                      <div class="wo">
                        <i class="fa-solid fa-cloud-arrow-down" style="color: #d60a0a"></i>
                        1 Tập Tin
                      </div>
                    </div>
                    <div class="download">
                      <button class="btndown">
                        <a class="down" href="/lEARNweb/powerpoint/Giáo Án.txt" download><i class="fa-regular fa-circle-down"></i>Tải xuống</a>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="last">
        <?php include "./ElementForMainpage/Group.php" ?>
      </div>
      <?php include "./ElementForMainpage/GroupCreate.php" ?>
      <div class="alert">
        <div class="alertword">
          <p>Bạn cần đăng nhập vào trang để xem tài liệu này</p>
          <a><i class="fa-solid fa-xmark"></i></a>
        </div>
      </div>
    </div>
    <?php include "./ElementForMainpage/Footer.php" ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="fileJS/style.js"></script>
</body>

</html>