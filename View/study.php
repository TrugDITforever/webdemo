<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Cssfile/style.css" />
  <link rel="icon" href="../imgg/loggo.png" />
  <link rel="stylesheet" href="../source font/fontawesome/fontawesome/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Learn and learn</title>

</head>

<body>
  <div>
    <?php include "./ElementForMainpage/header.php"; ?>
  </div>
  <div class="container">
    <div class="ads"></div>

    <div class="main">
      <div class="arrow">
        <a>
          <i class="fa-solid fa-arrow-up fa-2xl"></i>
        </a>
      </div>
      <?php include "./ElementForMainpage/tabmain.php"; ?>
      <div class="infor">
        <div class="outsideloginplace">
          <?php include "./ElementForMainpage/login-signup.php" ?>
        </div>
        <div class="board">
          <div class="board-btn prev">
            <i class="fa-solid fa-caret-left"></i>
          </div>
          <div class="board-btn nexxt">
            <i class="fa-solid fa-caret-right"></i>
          </div>
          <div class="peo1">
            <img src="https://image.baogialai.com.vn/w840/dataimages/202207/original/images3171534_1.jpg" alt="" />
            <h3>Dương Khánh Linh</h3>
            <h5>Toán: 9.5 Văn: 8.75 Anh: 9.5</h5>
          </div>
          <div class="peo1">
            <img src="https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/8/14/thu-khoa-1-7362-1660496226790395256435.jpg" alt="" />
            <h3>Trần Bảo Quân</h3>
            <h5>Toán: 8.75 Lí: 9.5 Anh: 9</h5>
          </div>
          <div class="peo1">
            <img src="https://static-images.vnncdn.net/files/publish/2022/8/23/z3664276784589-48b7f9aab1e867d6167f6dc60c6a0f88-1-112.jpg" alt="" />
            <h3>Nguyễn Bảo Ngọc</h3>
            <h5>Văn: 9 Sử: 9.5 Địa: 9.5</h5>
          </div>
          <div class="peo1">
            <img src="https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/8/14/thu-khoa-1-7362-1660496226790395256435.jpg" alt="" />
            <h3>Trần Chí Khanh</h3>
            <h5>Toán: 8.75 Lí: 9.5 Anh: 9</h5>
          </div>
          <div class="peo1">
            <img src="https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/8/14/thu-khoa-1-7362-1660496226790395256435.jpg" alt="" />
            <h3>Trần Hoàng Quân</h3>
            <h5>Toán: 8.75 Lí: 9.5 Anh: 9</h5>
          </div>
          <div class="peo1">
            <img src="https://static-images.vnncdn.net/files/publish/2022/8/23/z3664276784589-48b7f9aab1e867d6167f6dc60c6a0f88-1-112.jpg" alt="" />
            <h3>Dương Khánh Ly</h3>
            <h5>Văn: 9 Sử: 9.5 Địa: 9.5</h5>
          </div>
          <div class="peo1">
            <img src="https://static-images.vnncdn.net/files/publish/2022/8/23/z3664276784589-48b7f9aab1e867d6167f6dc60c6a0f88-1-112.jpg" alt="" />
            <h3>Nguyễn Quỳnh Nga</h3>
            <h5>Văn: 9 Sử: 9.5 Địa: 9.5</h5>
          </div>
          <div class="peo1">
            <img src="https://static-images.vnncdn.net/files/publish/2022/8/23/z3664276784589-48b7f9aab1e867d6167f6dc60c6a0f88-1-112.jpg" alt="" />
            <h3>Đặng Quang Phúc</h3>
            <h5>Văn: 9 Sử: 9.5 Địa: 9.5</h5>
          </div>
        </div>
        <div class="ask">
          <a> <img src="./imgg/team.png" alt="" />HỎI VÀ ĐÁP </a>
        </div>
        <div class="under-ask">
          <div class="ask-box">
            <span>Tìm môn học:</span>
            <select name="subject-status" id="ask-place" class="select-subject">
              <option value="">Tất cả</option>
              <option value="Toán học">Toán học</option>
              <option value="Ngữ Văn">Ngữ văn</option>
              <option value="Tiếng Anh">Tiếng anh</option>
              <option value="Hóa Học">Hóa học</option>
              <option value="Vật lí">Vật lí</option>
              <option value="Sinh học">Sinh học</option>
              <option value="Địa lí">Địa lí</option>
              <option value="Lịch sử">Lịch sử</option>
              <option value="GDCD">GDCD</option>
            </select>
          </div>
          <div class="btnpost">
            <button class="post-button">Đăng bài</button>
          </div>
        </div>
        <?php actioninstudy(); ?>
        <?php
        $row = getcmtstatus();
        $reversedArray = array_reverse($row);
        foreach ($reversedArray as $row) {
        ?>
          <div class="box1">
            <div class="pic1">
              <ul>
                <li>
                  <a href="index?post_id=<?php echo $row['id'] ?>" data-post-id="<?php echo $row['id'] ?>">
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
              </ul>
            </div>
            <div class="comment1">
              <p>
                <?php echo $row['cmtStatus'] ?>
              </p>
              <a>
              <img src="<?php echo "./uploadfile/" . $row['img']; ?>" alt="" />

              </a>

            </div>
            <div class="line"></div>
            <div class="place_tolike">
              <ul>
                <li><i class="fa-regular fa-thumbs-up fa-lg"></i>Thích</li>
                <li class="answer-comment"><i class="fa-regular fa-comment"></i>Trả lời</li>
                <li><i class="fa-regular fa-share-from-square"></i>Chia sẻ</li>
              </ul>
            </div>
          </div>

        <?php
        }
        ?>
        <div class="line"></div>

        <div class="customer-cmt">
          <div class="cmt-word">
            <div class="word-comment">
              <p>Mọi sự góp ý của các bạn sẽ giúp trang web tốt hơn</p>
            </div>
          </div>
          <div class="place-cmt">
            <div class="box-cmt">
              <form method="POST">
                <img src="../imgg/user.png" alt="" />
                <input type="hidden" name="action" value="postcomment">
                <input type="text" name="comments" placeholder="Viết bình luận tại đây..." />
                <button id="" type="submit">Đăng</button>
              </form>
            </div>
            <div class="cmt-container">
              <?php
              $row = getpostcomment();
              $reversedArray = array_reverse($row);
              foreach ($reversedArray as $comment) { ?>
                <div class="people-cmt">
                  <div>
                    <img src="https://thuthuatnhanh.com/wp-content/uploads/2019/02/anh-dai-dien-dep-cho-zalo.jpeg" alt="" />
                  </div>
                  <div class="name-cmt">
                    <p>
                      <?php echo $comment['nameuser'] ?>
                    </p>
                    <p>
                      <?php echo $comment['comment'] ?>
                    </p>
                  </div>
                </div>
              <?php } ?>
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
      <!-- poststatus-create-form -->
      <div class="Post-create">
        <i class="fa-solid fa-circle-xmark" id="close4"></i>
        <form method="post" enctype="multipart/form-data">
          <h4>
            Tạo bài viết
          </h4>
          <div class="status-form">
            <label>Môn học:</label>
            <input type="hidden" name="action" value="poststatus">
            <!-- <input type="text" name="subject-status" required /> -->
            <select name="subject-status" class="select-subject">
              <option value="Toán học">Toán học</option>
              <option value="Ngữ Văn">Ngữ văn</option>
              <option value="Tiếng Anh">Tiếng anh</option>
              <option value="Hóa Học">Hóa học</option>
              <option value="Vật lí">Vật lí</option>
              <option value="Sinh học">Sinh học</option>
              <option value="Địa lí">Địa lí</option>
              <option value="Lịch sử">Lịch sử</option>
              <option value="GDCD">GDCD</option>
            </select>
            <label>Mô tả:</label>
            <input type="text" name="decrip-status" required placeholder="Thêm mô tả tại đây..." />
            <label class="add-img create-status">Thêm ảnh:<i class="fa-solid fa-images" style="color: #04ff00;"></i></label>
            <input type="file" name="file-status" class="input-hidden create-status" required />
            <div class="place-img-select">
              <a class="del-img-status"><i class="fa-regular fa-circle-xmark"></i></a>
              <img class="img-status" src="">
            </div>
          </div>
          <input id="post-btn" type="submit" value="Đăng" />
        </form>
      </div>
      <!-- form post comment to status -->
      <div class="FormPostComment">
        <div class="Status-title">
          <div class="word-title-status" data-idpost="">
            <h2>Bài Viết của Trung Do</h2>
          </div>
          <div class="close-btn-status">
            <i class="fa-solid fa-xmark btn-close-status"></i>
          </div>
        </div>
        <div class="Content-status">
          <div class="Content-adminPost">
            <div class="adminPost-info">
              <div class="adminPost-img">
                <img src="./imgg/face.png" alt="">
              </div>
              <div class="adminPost-name">
                <p>Trung Do</p>
              </div>
            </div>
            <div class="admin-comment">
              <span></span>
            </div>
            <div class="admin-status-pic">
              <img src="https://2.bp.blogspot.com/-N5M0I9_1tks/XkElu5uQXII/AAAAAAAAARs/s6sQJXhXzC8CtdmKO3dNv9wKnMAsodQBwCLcBGAsYHQ/s1600/trac-nghiem-gioi-han-1.png" alt="">
            </div>
            <div class="number-comment-status">
              <span class="numbercom">10 bình luận</span>
            </div>
            <div class="comment-for-status">
              <!-- <div class="User-comment-contain">
                <div class="user-comment-info">
                  <div class="user-comment-pic">
                    <img src="./imgg/face.png" alt="">
                  </div>
                  <div class="user-comment-name-container">
                    <div class="user-comment-name">
                      <h4>Quang Anh Ta</h4>
                      <span>Bài này dễ mà em, ráp công thức vào mà làm
                      </span>
                    </div>
                  </div>
                </div>
              </div> -->

            </div>
          </div>
        </div>
        <div class="Place-comment-status">
          <div class="Place-comment-status-container">
            <div class="UserComment-Pic">
              <?php
              $row = getuserInfo();
              if (empty($row['name']) && empty($row['id_user']) && empty($row['img'])) {
                $row['name'] = "no name";
                $row['id_user'] = "";
                $row['img'] = "face.png";
              } else {
                echo '<img src="./uploadfile/' . $row['img'] . '" " data-id-user="' . $row['id_user'] . ' "data-username="' . $row['name'] . ' ">';
              }
              ?>
            </div>
            <form class="Form-comment-status">
              <div class="TextComment">
                <textarea class="editable-content" placeholder="Viết bình luận tại đây..."></textarea>
              </div>
              <button type="submit" class="btn-post-comment">
                <i class="fa-solid fa-paper-plane btn-post-status"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "./ElementForMainpage/Footer.php" ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="./fileJS/style.js"></script>
  <script>
    const searchForm = document.getElementById("search-form");
    const boxes = document.querySelectorAll(".box1");
    const searchInput = document.getElementById("ask-place");
    searchInput.addEventListener("input", function() {
      const searchTerm = searchInput.value.toLowerCase();
      boxes.forEach(function(box) {
        const subject = box
          .querySelector("li.space:nth-child(2) a")
          .textContent.toLowerCase();
        if (subject.includes(searchTerm) || searchTerm === "") {
          box.style.display = "block";
        } else {
          box.style.display = "none";
        }
      });
    });
    window.addEventListener("load", function () {
  const btnnext = document.querySelector(".nexxt");
  const btnpre = document.querySelector(".prev");
  const slideritems = document.querySelectorAll(".peo1");
  const slideritemswidth = slideritems[0].offsetWidth;
  const sliderlength = slideritems.length;
  console.log("sliderlength", sliderlength);
  console.log("slideritemswidth", slideritemswidth);
  btnnext.addEventListener("click", function () {
    handlechange(1);
  });
  btnpre.addEventListener("click", function () {
    handlechange(-1);
  });
  let positionx = 0;
  let index = 0;
  function handlechange(direction) {
    if (direction === 1) {
      if (index >= sliderlength - 3) {
        index = sliderlength - 3;
        return;
      }
      positionx = positionx - (slideritemswidth + 20);
      slideritems.forEach(function (element) {
        element.style = `transform: translateX(  ${positionx}px)`;
      });
      index++;
    } else if (direction === -1) {
      if (index <= 0) {
        index = 0;
        return;
      }
      positionx = positionx + (slideritemswidth + 20);
      slideritems.forEach(function (element) {
        element.style = `transform: translateX(  ${positionx}px)`;
      });
      index--;
    }
  }
});
  </script>
</body>

</html>