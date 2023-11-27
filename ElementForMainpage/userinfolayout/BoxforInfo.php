<div class="element1">
            <div class="BoxforInfo">
              <div class="UpperBox">
                <div class="ImgandName">
                  <img id="image" src="<?php echo $image ?>" />
                  <div class="file-upload">
                    <label class="custom-file-upload">
                      Tải ảnh
                      <i class="fa-solid fa-pen"></i>
                    </label>
                    <input id="file-input" type="file" accept="image/jpg, image/jpeg,image/png">
                  </div>
                  <p>
                    <?php echo "$useraddress" ?>
                  </p>
                </div>
              </div>
              <div class="BoxUnder">
                <form class="formchange">
                  <div class="elemetninform">
                    <label for="username">Tên</label>
                    <input type="text" name="username" id="username" value="<?php echo $userName ?>" autocomplete="none" required />
                  </div>
                  <div class="elemetninform">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="tel" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber ?> " required />
                  </div>
                  <div class="elemetninform">
                    <label for="username">Email</label>
                    <input type="text" name="userEmail" id="useremail" value="<?php echo "$userEmail" ?>" required />
                  </div>
                  <div class="elemetninform">
                    <label for="username">Địa chỉ</label>
                    <input type="text" name="username" id="address" value="<?php echo "$useraddress" ?>" required />
                  </div>
                  <div class="btnupdate1">
                    <button type="submit" class="btnupdateprofile">Cập nhật</button>
                  </div>
                  <div class="btnupdate2">
                    <button type="button" class="btncancle">Hủy</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="BoxforInfo">
              <div class="UpperBox">
                <div class="ImgandName">
                  <img src="<?php echo "$image" ?>" />
                </div>
              </div>
              <div class="BoxUnder">
                <h3>Thay đổi mật khẩu</h3>
                <?php
                if (isset($message)) {
                  foreach ($message as $message) {
                    echo '<div>' . $message . '</div>';
                  }
                };
                ?>
                <form class="formchange2" action="" method="post">
                  <div class="elemetninform">
                    <label for="">
                      Mật khẩu cũ<span>*</span>
                    </label>
                    <input type="text" name="currentpasss" id="currentpasss" placeholder="Nhập mật khẩu cũ" />
                  </div>
                  <div class="elemetninform">
                    <label for="username">
                      Mật khẩu mới
                    </label>
                    <input type="password" name="newpass" id="newpass" placeholder="Nhập mật khẩu mới" />
                  </div>
                  <div class="elemetninform">
                    <label for="cnewpass">
                      Xác nhận mật khẩu mới<span>*</span>
                    </label>
                    <input type="password" name="cnewpass" id="cnewpass" placeholder="Xác nhận mật khẩu mới" />
                  </div>
                  <div class="btnupdate1">
                    <button type="submit" name="submit">Cập nhật</button>
                  </div>
                  <div class="btnupdate2">
                    <button type="button">
                      Hủy
                    </button>
                  </div>

                </form>
              </div>
            </div>
            <div class="BoxforInfo">
              <div class="history_table">
                <div class="header_table">
                  <table class="styled-table ">
                    <thead>
                      <tr>
                        <th>Thời gian</th>
                        <th>Mô tả</th>
                        <th>Cấp bậc/Môn</th>

                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="content_table">
                  <table class="styled-table">
                    <tbody>
                      <?php
                      $sql2 = "SELECT * FROM `history_down` WHERE id_user = '$user_id'";
                      $statement = $con->prepare($sql2);
                      $statement->execute();
                      $row2 = $statement->fetchAll();
                      ?>
                      <?php
                      foreach ($row2 as $row2) {
                      ?>
                        <tr>
                          <td>
                            <?php echo $row2['time'] ?>
                          </td>
                          <td>
                            <p class="decrip_test" title="<?php echo $row2['decrip'] ?>">
                              <?php echo $row2['decrip'] ?>
                            </p>
                          </td>
                          <td>
                            <?php echo $row2['rank'] ?>
                          </td>
                        </tr>
                      <?php } ?>

                  </table>
                </div>
              </div>

            </div>
            <div class="BoxforInfo">
              <?php
              $row = getMypost();
              $reversedArray = array_reverse($row);
              foreach ($reversedArray as $row) :
              ?>
                <div class="box1">
                  <div class="pic1">
                    <ul>
                      <li>
                        <a data-post-id="<?php echo $row['id'] ?>">
                          <img width="40px" src="./imgg/team.png" alt="" />
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
                        <a> <img src="./imgg/ellipsis.png" ></a>
                        <ul class="small-submenu">
                          <li class="btn deletepost"><i class="fa-solid fa-trash-can" style="color: #cb1010;"></i>&nbspXóa bài</li>
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
                  <!-- <div class="place_tolike">
                    <ul>
                      <li><i class="fa-regular fa-thumbs-up fa-lg"></i>Thích</li>
                      <li class="answer-comment"><i class="fa-regular fa-comment"></i>Trả lời</li>
                      <li><i class="fa-regular fa-share-from-square"></i>Chia sẻ</li>
                    </ul>
                  </div> -->
                </div>
              <?php
              endforeach;
              ?>
            </div>
          </div>