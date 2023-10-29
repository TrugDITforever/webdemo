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
};
exitbtn.onclick = function () {
  pagedangnhap.classList.remove("appear");
  ads.classList.remove("active");
};
btnDangki.onclick = function () {
  ads.classList.add("active");
  pagedangnhap.classList.remove("appear");
  pagedangki.style.display = "block";
};
exitbtn2.onclick = function () {
  ads.classList.remove("active");
  pagedangki.style.display = "none";
};
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
      $(".alertword p").html("Bạn cần đăng nhập vào để tải xuống");
      $(".alert").addClass("moveout");
      setTimeout(() => {
        $(".alert").removeClass("moveout");
      }, 2000);
    } else {
      var index = $(".down").index(this);
      var woElement = $(".wo p:eq(" + index + ")").text();
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
          rank: getSchoolLevel(index),
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

  function getSchoolLevel(index) {
    if (index >= 0 && index <= 4) {
      return "Bậc tiểu học";
    } else if (index >= 5 && index <= 17) {
      return "Bậc THCS";
    } else if (index >= 18 && index <= 30) {
      return "Bậc THPT";
    } else {
      return "Không xác định";
    }
  }
});
//btnpost in stydy.php
$(document).ready(function () {
  $(".post-button").click(function () {
    let isSubmitted = localStorage.getItem("isAppear");
    if (isSubmitted === "false") {
      $(".alertword p").html("Bạn cần đăng nhập vào để đăng bài");
      $(".alert").addClass("moveout");
      setTimeout(function () {
        $(".alert").removeClass("moveout");
      }, 3000);
    } else {
      $(".Post-create").addClass("activate");
      ads.classList.add("active");
    }
  });
  $("#close4").click(function () {
    $(".Post-create").removeClass("activate");
    ads.classList.remove("active");
    $(".place-img-select").removeClass("active");
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
//btn down in 12tocolleage.php
$(document).ready(function () {
  let isSubmit = localStorage.getItem("isAppear");
  $(".down_test").on("click", function (event) {
    if (isSubmit === "false") {
      event.preventDefault();
      $(".alertword p").html("Bạn cần đăng nhập vào trang để tải tài liệu này");
      $(".alert").addClass("moveout");
    } else {
      var index = $(".down_test").index(this);
      var woElement = $(".test_name p:eq(" + index + ")")
        .text()
        .trim();
      var subjectName = $(".title span:eq(" + index + ")")
        .text()
        .trim();
      var currentDate = new Date();
      var day = currentDate.getDate();
      var month = currentDate.getMonth() + 1;
      var year = currentDate.getFullYear();
      $.ajax({
        url: "funtionofPage/tracking.php",
        type: "post",
        data: {
          decrip: woElement,
          rank: subjectName,
          day: day,
          month: month,
          year: year,
        },
        success: function (data) {
          console.log(data);
          if (data === "success") {
            $(".down_test:eq(" + index + ")").html("Đã tải");
          }
        },
      });
    }
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
          $(".alertword p").html("Chào mừng đến Learx2");
          $(".alert").addClass("moveout");
          $(".Page-login").removeClass("appear");
          $(".ads").removeClass("active");
          $(".outsideloginplace").addClass("disappear");
          localStorage.setItem("isAppear", "true");
          setTimeout(() => {
            $(".alert").removeClass("moveout");
          }, 2000);
        } else if (data === "error") {
          $(".alertword p").html("Sai tên đăng nhập/mật khẩu");
          $(".alert").addClass("moveout");
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

    // Kiểm tra các trường nhập liệu
    if (!username || !password || !confirmPassword || !userEmail) {
      alert("Vui lòng điền đầy đủ thông tin");
      return;
    }

    if (password !== confirmPassword) {
      $(".alertword p").html("Mật khẩu xác nhận không đúng");
      $(".alert").addClass("moveout");
      setTimeout(() => {
        $(".alert").removeClass("moveout");
      }, 2000);
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
          $(".alert").addClass("moveout");
          $(".alertword p").html("Đăng ký thành công!");
          $(".ads").removeClass("active");
          $(".Page-signup").css("display", "none");
          $(".outsideloginplace").addClass("disappear");
          localStorage.setItem("isAppear", "true");
          setTimeout(() => {
            $(".alert").removeClass("moveout");
          }, 2000);
        } else if (response === "error") {
          $(".alertword p").html("Tên người dùng đã tồn tại");
          $(".alert").addClass("moveout");
        }
      },
      error: function (xhr, status, error) {
        $(".alertword p").html("Lỗi cú pháp");
        $(".alert").addClass("moveout");
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
      $(".alertword p").html("Bạn cần đăng nhập vào để xem tài khoản");
      $(".alert").addClass("moveout");
      setTimeout(() => {
        $(".alert").removeClass("moveout");
      }, 2000);
    } else {
      window.location.href = "index?route=account";
    }
  });
  $(".btngroup").click(function () {
    const checkIsappear = localStorage.getItem("isAppear");
    if (checkIsappear === "false") {
      $(".alertword p").html("Bạn cần đăng nhập vào để xem tài khoản");
      $(".alert").addClass("moveout");
      setTimeout(() => {
        $(".alert").removeClass("moveout");
      }, 2000);
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
// PlaceForComment appear
$(document).ready(function () {
  $(".answer-comment").click(function () {
    var index = $(".answer-comment").index(this);
    var postid = $("a[data-post-id]:eq(" + index + ")").data("post-id");
    console.log(postid);
  });
});
//12tocollege js
//button when review
const revew = document.querySelector(".review");
const test1 = document.querySelector(".test:nth-child(1)");
const test2 = document.querySelector(".test:nth-child(2)");
const test3 = document.querySelector(".test:nth-child(3)");
const test4 = document.querySelector(".test:nth-child(4)");
const loginplacee = document.querySelector(".outsideloginplace");
const hovera = document.querySelectorAll(".read a");
const alertt = document.querySelector(".alert");
const alertword = document.querySelector(".alertword a");
const alertwords = document.querySelector(".alertword p");
alertword.addEventListener("click", function () {
  alertt.classList.remove("moveout");
});
hovera.forEach(function (element) {
  element.addEventListener("click", function () {
    const isSubmitted = localStorage.getItem("isAppear");
    if (isSubmitted === "false") {
      alertwords.innerHTML = "Bạn cần đăng nhập vào trang để xem tài liệu này";
      alertt.classList.add("moveout");
    } else if (isSubmitted === "true") {
      if (element === hovera[0]) {
        ads.classList.add("active");
        revew.classList.add("opacity");
        test1.classList.add("appearrr");
      }
      if (element === hovera[1]) {
        ads.classList.add("active");
        revew.classList.add("opacity");
        test2.classList.add("appearrr");
      }
      if (element === hovera[2]) {
        ads.classList.add("active");
        revew.classList.add("opacity");
        test3.classList.add("appearrr");
      }
      if (element === hovera[3]) {
        ads.classList.add("active");
        revew.classList.add("opacity");
        test4.classList.add("appearrr");
      }
    }
  });
});
ads.addEventListener("click", function (event) {
  var targetElement = event.target;
  if (targetElement != revew) {
    pagedangnhap.classList.remove("appear");
    pagedangki.style.display = "none";
    ads.classList.remove("active");
    revew.classList.remove("opacity");
    test1.classList.remove("appearrr");
    test2.classList.remove("appearrr");
    test3.classList.remove("appearrr");
    test4.classList.remove("appearrr");
  }
});
const tabmenuall = document.querySelectorAll(".tabmenub");
tabmenuall.forEach(function (element) {
  element.addEventListener("click", function () {
    tabmenu.classList.remove("addheight");
  });
});
// ? this is for dropdown menu
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
