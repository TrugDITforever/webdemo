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
        <?php $row = getGroupAll();
        foreach ($row as $row) :
        ?>
            <div class="group">
                <div class="group-img">
                    <div style="width: 50%; margin-right: 10px">
                        <a>
                            <img src="<?php if ($row['image'] !== "") {
                                            $image = $row['image'];
                                            echo "./uploadfile/$image";
                                        } else {
                                            $imgdefault = "./imgg/team.png";
                                            echo $imgdefault;
                                        } ?>" alt="" />
                        </a>
                    </div>
                    <div style="
                      display: flex;
                      justify-content: center;
                      align-items: center;
                    ">
                        <span><?php echo $row['groupname'] ?></span>
                    </div>
                </div>
                <div class="gr-btn">
                    <button>Tham Gia Ngay</button>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Get group that u create -->
        <p>Nhóm của tôi:</p>
        <?php $row = getGroupteam();
        foreach ($row as $row) :
        ?>
            <div class="group">
                <div class="group-img">
                    <div style="width: 50%; margin-right: 10px">
                        <a>
                            <img src="<?php if ($row['image'] !== "") {
                                            $image = $row['image'];
                                            echo "./uploadfile/$image";
                                        } else {
                                            $imgdefault = "./imgg/team.png";
                                            echo $imgdefault;
                                        } ?>" alt="" />
                        </a>
                    </div>
                    <div style="
                      display: flex;
                      justify-content: center;
                      align-items: center;
                    ">
                        <span><?php echo $row['groupname'] ?></span>
                    </div>
                </div>
                <div class="gr-btn">
                    <button>Vào xem</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- form create-group -->
