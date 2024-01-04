<div class="group-container">
    <div class="create">
        <p>Tạo nhóm để học cùng nhau nhé!!!</p>
        <button class="btngroup">
            <a>
            <i class="fa-solid fa-people-group"></i>    
                Tạo Nhóm
            </a>
        </button>
        <p>Nhóm phổ biến gần đây.</p>
    </div>
    <div class="group-main">
        <?php $row = getGroupAll();
        foreach ($row as $row) {
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
                    <div>
                        <span><?php echo $row['groupname'] ?></span>
                        <div class="gr-btn">
                            <button>Tham Gia</button>
                        </div>
                    </div>

                </div>
               
            </div>
        <?php } ?>
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
                    <div >
                        <span><?php echo $row['groupname'] ?></span>
                        <div class="gr-btn">
                    <button>Vào xem</button>
                </div>
                    </div>
                </div>
               
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- form create-group -->