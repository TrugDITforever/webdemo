<?php
require("./ElementForMainpage/database.php");
function getGrade()
{
  global $con;
  $sql = "SELECT * FROM `gradelevel`";
  $statement = $con->prepare($sql);
  if ($statement->execute()) {
    $row = $statement->fetchAll();
    $statement->closeCursor();
    return $row;
  } else {
    return false;
  }
} ?>
<div class="tab-main" id="tab-main">
  <div>
    <div class="menu1">
      <div class="listword">
        <a class="home">
          <i class="fa-solid fa-graduation-cap" style="color: #3e606f; font-size: 2rem"></i>
          Giáo án
        </a>
        <!-- <h5>GIÁO ÁN HỌC CƠ BẢN</h5> -->
        <div class="liststudy">
          <ul>
            <li>
              <a href="index?route=Classes" class="classname-selected"><i
                  class="fa-solid fa-caret-up fa-rotate-90"></i>Lớp
                1</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 2</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 3</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 4</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 5</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 6</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 7</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 8</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 9</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 10</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 11</a>
            </li>
            <li>
              <a href="index?route=Classes" class="classname-selected">Lớp 12</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="menu2">
      <div class="listword2">
        <h1 class="btnon">
          <i class="fa-solid fa-book-open-reader" style="font-size: 2rem; padding-right: 5px; color: #1d3e53"></i>
          Ôn thi
        </h1>
        <!-- <h4>Lộ trình ôn thi các khóa</h4> -->
      </div>
      <div class="liststudy2">
        <ul>
          <li>
            <a href="index?route=9to10class">Đề thi lớp 9 lên 10</a>
          </li>
          <li>
            <a href="index?route=College">Đề thi THPT quốc gia</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="menu3">
      <div class="listword3">
        <h1 class="btnluyen">
          <i class="fa-regular fa-address-book" style="font-size: 2rem; color: #1d3e53"></i>
          Luyện đề
        </h1>
        <!-- <h4>Các dạng đề hay qua các năm</h4> -->
      </div>
      <div class="liststudy3">
        <ul>
          <!-- <li>
                    <a href="index?route=Practice">TOÁN</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">VĂN</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">TIẾNG VIỆT</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">ANH</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">VẬT LÍ</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">HÓA HỌC</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">SINH HỌC</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">LỊCH SỬ</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">ĐỊA LÍ</a>
                  </li>
                  <li>
                    <a href="index?route=Practice">GIÁO DỤC CÔNG DÂN</a>
                  </li> -->
          <?php
          $row = getGrade();
          foreach ($row as $row) {
            ?>
            <li>
              <a href="index?route=Practice&rank=<?php echo $row['id'] ?>&name=<?php echo $row['grade'] ?>">
                <?php echo $row['grade'] ?>
              </a>
            </li>
            <!-- <li>
              <a href="index?route=Practice&rank=1">Bậc trung học cơ sở</a>
            </li>
            <li>
              <a href="index?route=Practice&rank=1">Bậc trung học phổ thông</a>
            </li> -->
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>