//prevent user change default route
function movetomainpage() {
  const checkIsappear = localStorage.getItem("isAppear");
  if (checkIsappear === "false") {
    window.location.href = "index?route=mainpage";
  }
}
movetomainpage();
// btn change handling
$(document).ready(function () {
  $(".infor").click(function () {
    $(".BoxforInfo:nth-child(1)").removeClass("moveout1");
    $(".BoxforInfo:nth-child(2)").removeClass("moveout2");
    $(".BoxforInfo:nth-child(3)").removeClass("moveout2");
    $(".BoxforInfo:nth-child(4)").removeClass("moveout2");
  });
  $(".passwordBlock").click(function () {
    $(".BoxforInfo:nth-child(1)").addClass("moveout1");
    $(".BoxforInfo:nth-child(2)").addClass("moveout2");
    $(".BoxforInfo:nth-child(3)").removeClass("moveout2");
    $(".BoxforInfo:nth-child(4)").removeClass("moveout2");
  });
  $(".btnhistory").click(function () {
    $(".BoxforInfo:nth-child(1)").addClass("moveout1");
    $(".BoxforInfo:nth-child(2)").removeClass("moveout2");
    $(".BoxforInfo:nth-child(3)").addClass("moveout2");
    $(".BoxforInfo:nth-child(4)").removeClass("moveout2");
  });
  $(".btnhistory-mypost").click(function () {
    $(".BoxforInfo:nth-child(1)").addClass("moveout1");
    $(".BoxforInfo:nth-child(2)").removeClass("moveout2");
    $(".BoxforInfo:nth-child(3)").removeClass("moveout2");
    $(".BoxforInfo:nth-child(4)").addClass("moveout2");
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
// logout function
$(document).ready(function () {
  $(".logoutbtn").click(function () {
    console.log("click");
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
// update user profile
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
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      },
    });

    if (fileInput) {
      formData.append("fileToUpload", fileInput);
      console.log(fileInput);
    } else {
      var imgSrc = $("#image").attr("src");
      var parts = imgSrc.split("/");
      var lastPart = parts[parts.length - 1];
      console.log(lastPart);
      formData.append("fileToUpload", lastPart);
      console.log(lastPart);
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
        console.log(data);
        if (data === "success-UPDATE") {
          Toast.fire({
            icon: "success",
            title: "Cập nhật thành công!",
          });
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        } else {
          console.log(data);
        }
      },
    });
  });
});
//update password
$(document).ready(function () {
  $(".formchange2").submit(function (event) {
    event.preventDefault();
    let currentpass = $("#currentpasss").val();
    let newpass = $("#newpass").val();
    let cpassword = $("#cnewpass").val();
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      },
    });
    if (newpass !== cpassword) {
      Toast.fire({
        icon: "error",
        title: "Mật khẩu xác nhân không đúng!",
      });
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
          Toast.fire({
            icon: "success",
            title: "Cập nhật thành công!",
          });
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
//cacel update password
$(document).on("click", ".btnupdate2", function (e) {
  $("#currentpasss").val("");
  $("#newpass").val("");
  $("#cnewpass").val("");
});
// manage postStatus
$(document).ready(function () {
  var index;
  $(".deletepost").click(function () {
    index = $(".deletepost").index(this);
    var postid = $("a[data-post-id]:eq(" + index + ")").data("post-id");
    console.log(postid);
    $(".Confirm-form-delete").addClass("moveout");
  });
  $(".primary-button").click(function () {
    $(".Confirm-form-delete").removeClass("moveout");
  });
  $(".secondary-button").click(function () {
    var postid = $("a[data-post-id]:eq(" + index + ")").data("post-id");
    $.ajax({
      url: "./funtionofPage/deletePostofUser.php",
      type: "POST",
      data: {
        postid: postid,
      },
      success: function (res) {
        console.log(res);
        if (res === "success") {
          $(".Confirm-form-delete").removeClass("moveout");
          $(".containerPost:eq(" + index + ")").remove();
        }
      },
    });
  });
});
