<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Cssfile/style.css" />
  <link rel="stylesheet" href="Cssfile/9to10.css" />
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
        <a>
          <i class="fa-solid fa-arrow-up fa-2xl"></i>
        </a>
      </div>
      <?php include "ElementForMainpage/tabmain.php"; ?>

      <div class="infor">
        <div class="outsideloginplace">
          <?php include "ElementForMainpage/login-signup.php"; ?>

        </div>
        <!-- //start here -->
        <div class="opening">
          <div class="topic">
            <p>Tuyển tập đề thi vào 10</p>
          </div>
          <p>
            Nhằm giúp các bạn ôn luyện và giành được kết quả cao trong kì thi
            tuyển sinh vào lớp 10, LearnX2 biên soạn tuyển tập Đề thi vào lớp
            10 theo cấu trúc ra đề Trắc nghiệm - Tự luận mới. Cùng với đó là
            các dạng bài tập hay có trong đề thi vào lớp 10. Hi vọng tài liệu
            này sẽ giúp học sinh ôn luyện, củng cố kiến thức và chuẩn bị tốt
            cho kì thi tuyển sinh vào lớp 10 môn Toán năm 2023.
          </p>
        </div>
        <div class="listtest">
          <div class="list">
            <h3>Danh sách các đề thi</h3>
          </div>
          <div class="list-test">
            <ul>
              <?php $row = getTest();
              foreach ($row as $row) :
              ?>
                <li>
                  <a href="#de<?php echo $row['id'] ?>">Đề ôn thi môn toán lớp 9 lên 10(đề <?php echo $row['id'] ?>)</a>
                </li>
              <?php endforeach; ?>

            </ul>
          </div>
        </div>
        <?php $row = getTest();
        foreach ($row as $row) :
        ?>
          <div class="all" id="de<?php echo $row['id'] ?>" data-id-test="<?php echo $row['id'] ?>">
            <div class="start">
              <h1>Đề ôn thi môn toán lớp 9 lên 10(đề <?php echo $row['id'] ?>)</h1>
            </div>
            <div class="check">
              <label class="tasks-list-item">
                <input type="checkbox"  class="tasks-list-cb" <?php $row2 = checkTestdone($row['id']);
                                                                                                      if (empty($row2)) {
                                                                                                        echo '';
                                                                                                      } else {
                                                                                                        if ($row2['check'] === "true") {
                                                                                                          echo "checked";
                                                                                                        } else {
                                                                                                          echo "";
                                                                                                        }
                                                                                                      }
                                                                                                      ?> />
                <span class="tasks-list-mark"></span>
                <span class="tasks-list-desc">Đã hoàn thành</span>
              </label>
            </div>

            <div class="placefortest">
              <div class="dethi"></div>
              <div class="exam1">
                <img src="<?php echo $row['imgtest'] ?>" alt="" />
              </div>
            </div>
          </div>
        <?php endforeach; ?>


        <!-- end here -->
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
  <script src="fileJS/class9to10.js"></script>

</body>

</html>