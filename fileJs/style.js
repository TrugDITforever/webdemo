const btnDangNhap = document.getElementById("btn");
const pagedangnhap = document.querySelector(".Page-login");
const exitbtn = document.getElementById("close");
const btnDangki = document.getElementById("btn2");
const pagedangki = document.querySelector(".Page-signup");
const exitbtn2 = document.getElementById("close2");
const btnmovetosignup = document.getElementById("movetosignup");
const btnmovetologin = document.getElementById("btnmovetologin");
var header = document.querySelector(".head");
var headerheight = header.offsetHeight;
var tabmenu = document.querySelector(".tab-mainmenu");
const ads = document.querySelector(".ads");
const arrow = document.querySelector(".arrow");
const infor = document.querySelector(".infor");
window.addEventListener("scroll", function () {
  var scroll = this.window.scrollY;
  if (scroll >= 20) {
    arrow.classList.add("appear");
    // divunder.classList.add("appear");
  } else {
    // divunder.classList.remove("appear");
    arrow.classList.remove("appear");
  }
});
// searching in mainpage
btnmovetosignup.onclick = function () {
  pagedangnhap.classList.remove("appear");
  pagedangki.style.display = "block";
};
btnmovetologin.onclick = function () {
  pagedangnhap.classList.add("appear");
  pagedangki.style.display = "none";
};
btnDangNhap.onclick = function () {
  ads.classList.add("active");
  pagedangnhap.classList.add("appear");
  pagedangki.style.display = "none";
  document.body.style.overflow = "hidden";
};
exitbtn.onclick = function () {
  pagedangnhap.classList.remove("appear");
  ads.classList.remove("active");
  document.body.style.overflow = "";
};
btnDangki.onclick = function () {
  ads.classList.add("active");
  pagedangnhap.classList.remove("appear");
  pagedangki.style.display = "block";
  document.body.style.overflow = "hidden";
};
exitbtn2.onclick = function () {
  ads.classList.remove("active");
  pagedangki.style.display = "none";
  document.body.style.overflow = "";
};
///scroll up
$(".arrow").on("click", function () {
  window.scrollTo(0, 0);
});
// image select for create-status-form
$(document).ready(function () {
  $(".create-status").change(function () {
    const selectedFile = this.files[0];
    if (selectedFile) {
      $(".place-img-select").addClass("active");
      const objectURL = URL.createObjectURL(selectedFile);
      $(".img-status").attr("src", objectURL);
    } else {
      $(".img-status").attr("src", "");
    }
  });
  $(".del-img-status").click(function () {
    $(".place-img-select").removeClass("active");
    $(".img-status").attr("src", "");
  });
});
// image select for create-group-form
$(document).ready(function () {
  $(".image-createform").attr(
    "src",
    "https://png.pngtree.com/png-clipart/20230914/original/pngtree-cartoon-friends-group-hd-vector-images-smc-tfsa-png-image_11086182.png"
  );
  $(".input-creategroup").change(function () {
    const fileselected = this.files[0];
    if (fileselected) {
      const objectURL = URL.createObjectURL(fileselected);
      $(".image-createform").attr("src", objectURL);
      $(".image-createform").addClass("borderimg");
    } else {
      $(".image-createform").attr(
        "src",
        "https://png.pngtree.com/png-clipart/20230914/original/pngtree-cartoon-friends-group-hd-vector-images-smc-tfsa-png-image_11086182.png"
      );
    }
  });
});
///btn down in class1.php
$(document).ready(function () {
  let isSubmitted = localStorage.getItem("isAppear");
  $(".down").on("click", function (event) {
    if (isSubmitted === "false") {
      event.preventDefault();
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
      Toast.fire({
        icon: "error",
        title: "Cần đăng nhập để dùng chức năng này",
      });
    } else {
      var index = $(".down").index(this);
      var woElement = $(".wo p:eq(" + index + ")").text();
      var wordClass = $(".wordprimary span").text();
      $(".btndown:eq(" + index + ")").addClass("changee");
      var currentDate = new Date();
      var day = currentDate.getDate();
      var month = currentDate.getMonth() + 1;
      var year = currentDate.getFullYear();
      $.ajax({
        url: "funtionofPage/tracking.php",
        type: "post",
        data: {
          decrip: woElement,
          rank: wordClass,
          day: day,
          month: month,
          year: year,
        },
        success: function (data) {
          console.log(data);
          if (data === "success") {
          }
        },
      });
    }
  });
});
//btnpost in stydy.php
$(document).ready(function () {
  $(".post-button").click(function () {
    let isSubmitted = localStorage.getItem("isAppear");
    if (isSubmitted === "false") {
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
      Toast.fire({
        icon: "error",
        title: "Cần đăng nhập vào để đăng bài!",
      });
    } else {
      $(".Post-create").addClass("activate");
      ads.classList.add("active");
    }
  });
  $("#close4").click(function () {
    $(".Post-create").removeClass("activate");
    ads.classList.remove("active");
    $(".place-img-select").removeClass("active");
    $("input").val();
    $(".img-status").attr("src", "");
  });
});
//likebtn in study.php
$(document).ready(function () {
  $(".place_tolike ul li:nth-child(1)").click(function () {
    var index = $(".place_tolike ul li:nth-child(1)").index(this);
    $(".place_tolike li:nth-child(1):eq(" + index + ")").toggleClass(
      "changecolor"
    );
  });
});
$(document).ready(function () {
  var isdisAppear = localStorage.getItem("isAppear");
  if (isdisAppear === "true") {
    $(".outsideloginplace").addClass("disappear");
  } else if (isdisAppear === "false") {
    $(".outsideloginplace").removeClass("disappear");
  }
});
//login function
$(document).ready(function () {
  $(".loginform").on("submit", function (event) {
    event.preventDefault();
    let userLoginn = $("#username").val();
    let password = $("#password").val();
    $.ajax({
      url: "../funtionofPage/login.php",
      type: "POST",
      data: {
        userLogin: userLoginn,
        passwordlogin: password,
      },
      success: function (data) {
        console.log(data);
        if (data === "success") {
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
          Toast.fire({
            icon: "success",
            title: "Chào mừng đến Learnx2",
          });
          $(".Page-login").removeClass("appear");
          $(".ads").removeClass("active");
          $(".outsideloginplace").addClass("disappear");
          localStorage.setItem("isAppear", "true");
          setTimeout(() => {
            window.location.reload();
          }, 3000);
        } else if (data === "error") {
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
          Toast.fire({
            icon: "error",
            title: "Tên đăng nhập hoặc mật khẩu không chính xác!",
          });
          $("#username").val("");
          $("#password").val("");
          setTimeout(() => {
            $(".alert").removeClass("moveout");
          }, 2000);
        }
      },
    });
  });
});
//sign up function
$(document).ready(function () {
  $(".signupform").on("submit", function (event) {
    event.preventDefault();
    let username = $("#username2").val();
    let password = $("#password2").val();
    let confirmPassword = $("#password3").val();
    let userEmail = $("#email").val();
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
    // Kiểm tra các trường nhập liệu
    if (!username || !password || !confirmPassword || !userEmail) {
      Toast.fire({
        icon: "error",
        title: "Vui lòng điền đầy đủ thông tin",
      });
      return;
    }

    if (password !== confirmPassword) {
      Toast.fire({
        icon: "error",
        title: "Mật khẩu xác nhận không đúng!",
      });
      return;
    }
    $.ajax({
      url: "../funtionofPage/signup.php",
      type: "post",
      data: {
        usernamesignup: username,
        passwordsignup: password,
        userEmailsignup: userEmail,
      },
      success: function (response) {
        console.log(response);
        if (response === "success") {
          Toast.fire({
            icon: "success",
            title: "Đăng kí thành công!",
          });
          $(".ads").removeClass("active");
          $(".Page-signup").css("display", "none");
          $(".outsideloginplace").addClass("disappear");
          localStorage.setItem("isAppear", "true");

          setTimeout(() => {
            window.location.reload();
          }, 1000);
        } else if (response === "duplicate") {
          Toast.fire({
            icon: "error",
            title: "Tên người dùng đã tồn tại!",
          });
        } else {
          Toast.fire({
            icon: "error",
            title: "Đã xảy ra lỗi. Vui lòng thử lại sau!",
          });
        }
      },
      error: function (xhr, status, error) {
        Toast.fire({
          icon: "error",
          title: "Đã xảy ra lỗi. Vui lòng thử lại sau!",
        });
        console.log(error);
        console.log(xhr.responseText);
        console.log(status);
      },
    });
  });
});

///confirm islogin or not
$(document).ready(function () {
  $(".pageinfo").click(function () {
    const checkIsappear = localStorage.getItem("isAppear");
    if (checkIsappear === "false") {
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
      Toast.fire({
        icon: "error",
        title: "Cần đăng nhập vào để xem tài khoản!",
      });
    } else {
      window.location.href = "index?route=account";
    }
  });
  $(".btngroup").click(function () {
    const checkIsappear = localStorage.getItem("isAppear");
    if (checkIsappear === "false") {
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
      Toast.fire({
        icon: "error",
        title: "Cần đăng nhập vào để tạo nhóm!",
      });
    } else {
      $(".group-create").addClass("activate");
      $(".ads").addClass("active");
    }
  });
  $("#close3").click(function () {
    $(".group-create").removeClass("activate");
    $(".ads").removeClass("active");
  });
});
// PlaceForComment appear(getpostID.php)
$(document).ready(function () {
  $(".close-btn-status").click(function () {
    $(".FormPostComment").removeClass("activate");
    $(".ads").removeClass("active");
    $(".editable-content").val("");
    $("body").css("overflow", "");
  });
  $(".answer-comment").click(function () {
    var index = $(".answer-comment").index(this);
    var postid = $("a[data-post-id]:eq(" + index + ")").data("post-id");
    $("body").css("overflow", "hidden");
    $.ajax({
      url: "../funtionofPage/getPostID.php",
      type: "post",
      data: {
        postid: postid,
      },
      success: function (data) {
        var responseObject = JSON.parse(data);
        if (responseObject.message === "success") {
          $(".FormPostComment").addClass("activate");
          $(".ads").addClass("active");
          $(".adminPost-name p").html(responseObject.data.nameuser);
          $(".admin-comment span").html(responseObject.data.cmtStatus);
          $(".word-title-status h2").html(
            "Bài viết của " + responseObject.data.nameuser
          );
          $("div[data-idpost]").data("idpost", postid);
          $(".comment-for-status").html("");
          let numbercom = responseObject.listcomments.length;
          $(".numbercom").html(numbercom + " bình luận");
          responseObject.listcomments.forEach((value, key) => {
            const divlistcomment = $(`
            <div class="User-comment-contain">
            <div class="user-comment-info">
                <div class="user-comment-pic">
                  <img src="./uploadfile/${value.img}" alt="">
                </div>
                <div class="user-comment-name-container">
                  <div class="user-comment-name">
                    <h4>${value.username}</h4>
                    <span>${value.comment}</span>
                  </div>
                </div>
              </div>
              </div>
          `);
            $(".comment-for-status").append(divlistcomment);
          });
        }
      },
    });

    console.log(postid);
  });
});
///Post Comment from User to PostForm
$(document).ready(function () {
  $(".Form-comment-status").on("submit", function (e) {
    e.preventDefault();
    const checkIsappear = localStorage.getItem("isAppear");
    if (checkIsappear === "false") {
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
      Toast.fire({
        icon: "error",
        title: "Cần đăng nhập vào để dùng chức năng này!",
      });
    } else {
      var id = $("img[data-id-user]").data("id-user");
      var username = $("img[data-username]").data("username");
      var comment = $(".editable-content").val();
      var postid = $("div[data-idpost]").data("idpost");
      $.ajax({
        url: "../funtionofPage/getusercomment.php",
        type: "POST",
        data: {
          postid: postid,
          iduser: id,
          username: username,
          comment: comment,
        },
        success: function (data) {
          console.log(data);
          const responejson = JSON.parse(data);
          if (responejson.message === "success") {
            handleCreateComment();
          }
        },
      });
    }
  });
  function showcomment(user, commentofuser) {
    const container = $("<div>").addClass("User-comment-contain");
    const userinfo = $("<div>").addClass("user-comment-info");
    const userpic = $("<div>").addClass("user-comment-pic");
    const userpic_img = $("<img>").attr("src", "./imgg/face.png");
    userpic.append(userpic_img);
    const userpic_comment_container = $("<div>").addClass(
      "user-comment-name-container"
    );
    const userpic_comment_name = $("<div>").addClass("user-comment-name");
    const nameuser = $("<h4>").html(user);
    const usercomment = $("<span>").html(commentofuser);
    userpic_comment_name.append(nameuser);
    userpic_comment_name.append(usercomment);
    userpic_comment_container.append(userpic_comment_name);
    //
    userinfo.append(userpic);
    userinfo.append(userpic_comment_container);
    container.append(userinfo);
    return container;
  }
  function handleCreateComment() {
    var username = $("img[data-username]").data("username");
    var comment = $(".editable-content").val();
    const comment_for_status = $(".comment-for-status");
    const newCommentElement = showcomment(username, comment);
    const firstCommentElement = comment_for_status.children().first();
    if (firstCommentElement.length > 0) {
      newCommentElement.insertBefore(firstCommentElement);
    } else {
      comment_for_status.append(newCommentElement);
    }
    $(".editable-content").val("");
  }
});

// window.addEventListener("load", function () {
//   const btnnext = document.querySelector(".nexxt");
//   const btnpre = document.querySelector(".prev");
//   const slideritems = document.querySelectorAll(".peo1");
//   const slideritemswidth = slideritems[0].offsetWidth;
//   const sliderlength = slideritems.length;
//   console.log("sliderlength", sliderlength);
//   console.log("slideritemswidth", slideritemswidth);
//   btnnext.addEventListener("click", function () {
//     handlechange(1);
//   });
//   btnpre.addEventListener("click", function () {
//     handlechange(-1);
//   });
//   let positionx = 0;
//   let index = 0;
//   function handlechange(direction) {
//     if (direction === 1) {
//       if (index >= sliderlength - 3) {
//         index = sliderlength - 3;
//         return;
//       }
//       positionx = positionx - (slideritemswidth + 20);
//       slideritems.forEach(function (element) {
//         element.style = `transform: translateX(  ${positionx}px)`;
//       });
//       index++;
//     } else if (direction === -1) {
//       if (index <= 0) {
//         index = 0;
//         return;
//       }
//       positionx = positionx + (slideritemswidth + 20);
//       slideritems.forEach(function (element) {
//         element.style = `transform: translateX(  ${positionx}px)`;
//       });
//       index--;
//     }
//   }
// });

//button when review
// import { showReview } from "./12tocollege";
// showReview();
///post comments
// const commentButton = $(".box-cmt button");
// commentButton.on("click", handleCreateComment);
// function createCommentElement(name, content, avatarSrc) {
//   const commentDiv = $("<div>").addClass("people-cmt");
//   const imgDiv = $("<div>");
//   const img = $("<img>").attr("src", avatarSrc);
//   imgDiv.append(img);
//   const nameContentDiv = $("<div>").addClass("name-cmt");
//   const nameParagraph = $("<p>").text(name);
//   const contentParagraph = $("<p>").text(content);
//   nameContentDiv.append(nameParagraph);
//   nameContentDiv.append(contentParagraph);
//   commentDiv.append(imgDiv);
//   commentDiv.append(nameContentDiv);
//   return commentDiv;
// }

// function handleCreateComment() {
//   const input = $(".box-cmt input");
//   const commentsContainer = $(".cmt-container");
//   const name = "NO Name";
//   const content = input.val();
//   const avatarSrc =
//     "https://thuthuatnhanh.com/wp-content/uploads/2019/02/anh-dai-dien-dep-cho-zalo.jpeg";
//   if (content.trim() !== "") {
//     const newCommentElement = createCommentElement(name, content, avatarSrc);
//     const firstCommentElement = commentsContainer.children().first();
//     if (firstCommentElement.length > 0) {
//       newCommentElement.insertBefore(firstCommentElement);
//     } else {
//       commentsContainer.append(newCommentElement);
//     }
//     input.val("");
//   }
// }
// anima
