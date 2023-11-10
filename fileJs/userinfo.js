$(document).ready(function () {
  $(".infor").click(function () {
    $(".BoxforInfo:nth-child(1)").removeClass("moveout1");
    $(".BoxforInfo:nth-child(2)").removeClass("moveout2");
    $(".BoxforInfo:nth-child(3)").removeClass("moveout2");
  });
  $(".passwordBlock").click(function () {
    $(".BoxforInfo:nth-child(1)").addClass("moveout1");
    $(".BoxforInfo:nth-child(2)").addClass("moveout2");
    $(".BoxforInfo:nth-child(3)").removeClass("moveout2");
  });
  $(".btnhistory").click(function () {
    $(".BoxforInfo:nth-child(1)").addClass("moveout1");
    $(".BoxforInfo:nth-child(2)").removeClass("moveout2");
    $(".BoxforInfo:nth-child(3)").addClass("moveout2");
  });
  $(".logoutbtn").click(function () {
    const reset = "true";
    $.ajax({
      url: "./funtionofPage/resetSession.php",
      type: "POST",
      data: { reset: reset },
      success: function (data) {
        console.log(data);
        if (data === "success") {
          localStorage.setItem("isAppear", "false");
          window.location.href = "index?route=mainpage";
        } else {
          return false;
        }
      },
    });
  });
});
$(document).ready(function () {
  $("#file-input").change(function () {
    const selectedFile = this.files[0];
    if (selectedFile) {
      const objectURL = URL.createObjectURL(selectedFile);
      $("#image").attr("src", objectURL);
    } else {
      $("#image").attr("src", "");
    }
  });
});

$(document).ready(function () {
  $(".formchange").submit(function (event) {
    event.preventDefault();
    let username = $("#username").val();
    let phonenumber = $("#phonenumber").val().trim();
    let useremail = $("#useremail").val();
    let usseraddress = $("#address").val();
    var formData = new FormData();
    formData.append("username", username);
    formData.append("phonenumber", phonenumber);
    formData.append("usseraddress", usseraddress);
    formData.append("useremail", useremail);
    var fileInput = $("#file-input")[0].files[0];
    if (fileInput) {
      formData.append("fileToUpload", fileInput);
      console.log(fileInput);
    } else {
      var imgSrc = $("#image").attr("src");
      formData.append("fileToUpload", imgSrc);
      console.log(imgSrc);
    }
    if (isNaN(phonenumber)) {
      $(".alertword p").html("Vui Lòng nhập đúng kiểu số điện thoại");
      $(".alert").addClass("moveout");
      return;
    }
    $.ajax({
      url: "funtionofPage/updateProfile.php",
      type: "POST",
      processData: false,
      contentType: false,
      data: formData,
      success: function (data) {
        // console.log(data);
        if (data == "success-UPDATE") {
          $(".alertword p").html("Cập nhật thành công");
          $(".alert").addClass("moveout");
          setTimeout(() => {
            $(".alert").removeClass("moveout");
          }, 3000);
        } else {
          console.log(data);
        }
      },
    });
  });
});
///update password
$(document).ready(function () {
  $(".formchange2").submit(function (event) {
    event.preventDefault();
    let currentpass = $("#currentpasss").val();
    let newpass = $("#newpass").val();
    let cpassword = $("#cnewpass").val();
    if (newpass !== cpassword) {
      $(".alertword p").html("Mật khẩu xác nhận sai!");
      $(".alert").addClass("moveout");
      setTimeout(() => {
        $(".alert").removeClass("moveout");
      }, 2000);
      return;
    }
    $.ajax({
      url: "funtionofPage/updatepssword.php",
      type: "POST",
      data: {
        currentpass,
        newpass,
      },
      success: function (data) {
        console.log(data);
        if (data === "success") {
          $(".alertword p").html("Cập nhật thành công");
          $(".alert").addClass("moveout");
          setTimeout(() => {
            $(".alert").removeClass("moveout");
          }, 3000);
          $("#currentpasss").val("");
          $("#newpass").val("");
          $("#cnewpass").val("");
        } else if (data === "error") {
          $("#currentpasss").val("");
          $("#newpass").val("");
          $("#cnewpass").val("");
          $(".alertword p").html("Lỗi rồi bạn êi");
          $(".alert").addClass("moveout");
          setTimeout(() => {
            $(".alert").removeClass("moveout");
          }, 3000);
        }
      },
    });
  });
});