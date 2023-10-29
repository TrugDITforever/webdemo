<div class="group-create">
    <i class="fa-solid fa-circle-xmark" id="close3"></i>
    <h4 class="create-word">
        TẠO NHÓM
    </h4>
    <div class="containform-create">
        <form class="Creategroup" method="post" enctype="multipart/form-data">
            <div class="create-form" id="loginform">
                <input type="hidden" name="action" value="gr-create">
                <label>Tên Nhóm:</label>
                <input type="text" name="nameGroup" required />
                <label>Thành viên:</label>
                <input type="text" name="decrip" placeholder="Thêm thành viên(không bắt buộc)" />
                <label class="add-img creategroup">Ảnh nhóm:<i class="fa-solid fa-images" style="color: #04ff00;"></i></label>
                <input type="file" name="fileCreategroup" class="input-creategroup" required />
                <input id="create-btn" type="submit" value="Tạo Nhóm" />
            </div>
        </form>
        <div class="Picture-Group">
            <img class="image-createform" src="" alt="">
        </div>
    </div>
</div>