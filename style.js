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

// window.addEventListener("scroll", function () {
//   var scrollDistance = window.scrollY;
//   if (scrollDistance >= 100) {
//     header.classList.add("hide");
//     tabmenu.classList.add("padd");
//   } else {
//     header.classList.remove("hide");
//     tabmenu.classList.remove("padd");
//   }
// });
// scroll of infor
// const divunder = document.querySelectorAll(".div-under");
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
const btngroup = document.querySelector(".btngroup");
const groupcreate = document.querySelector(".group-create");
btngroup.addEventListener("click", function () {
  groupcreate.classList.add("activate");
  ads.classList.add("active");
});
const exitbtn3 = document.getElementById("close3");
exitbtn3.addEventListener("click", function () {
  groupcreate.classList.remove("activate");
  ads.classList.remove("active");
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

//btndowwnALL
// let isSubmitted = false;
// const btnDownLinks = document.querySelectorAll(".down");
// btnDownLinks.forEach(function (element, index) {
//   element.addEventListener("click", function (event) {
//     if (isSubmitted === false) {
//       event.preventDefault();
//       var woElement = document.querySelectorAll(".wo p");
//       woElement = woElement[index].textContent;
//       console.log(woElement);
//       alertwords.innerHTML = "Bạn cần đăng nhập vào trang để tải tài liệu này";
//       alertt.classList.add("moveout");
//     } else if (isSubmitted === true) {
//       const btnDown = document.querySelectorAll(".btndown");
//       btnDown.forEach(function (element) {
//         console.log(btnDown.length);
//         element.addEventListener("click", function () {
//           element.classList.add("changee");
//         });
//       });
//     }
//   });
// });

$(document).ready(function () {
  let isSubmitted = localStorage.getItem("isAppear");
  $(".down").on("click", function (event) {
    if (isSubmitted === "false") {
      event.preventDefault();
      $("#alertwords").html("Bạn cần đăng nhập vào trang để tải tài liệu này");
      $("#alertt").addClass("moveout");
    } else {
      var index = $(".down").index(this);
      var woElement = $(".wo p:eq(" + index + ")").text();
      console.log(getSchoolLevel(index) + ": " + woElement);
      $(".btndown:eq(" + index + ")").addClass("changee");
      var currentDate = new Date();
      var day = currentDate.getDate();
      var month = currentDate.getMonth() + 1; // Tháng bắt đầu từ 0
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
  $(".loginform").submit(function (event) {
    event.preventDefault();
    let userLoginn = $("#username").val();
    let password = $("#password").val();
    $.ajax({
      url: "funtionofPage/login.php",
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
          $(".alertword p").html("Sai tên đăng nhập/ mật khẩu");
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

// even when sign up
$(document).ready(function () {
  $(".signupform").submit(function (event) {
    event.preventDefault();
    let username = $("#username2").val();
    let password = $("#password2").val();
    let confirmPassword = $("#password3").val();
    let userEmail = $("#email").val();
    if (password !== confirmPassword) {
      $(".alertword p").html("Mật khẩu xác nhận không đúng");
      $(".alert").addClass("moveout");
      setTimeout(() => {
        $(".alert").removeClass("moveout");
      }, 2000);
      return;
    }
    $.ajax({
      url: "funtionofPage/signup.php",
      type: "post",
      data: {
        usernamesignup: username,
        passwordsignup: password,
        userEmailsignup: userEmail,
      },
      success: function (response) {
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
        $(".alertword p").html("lỗi cú pháp");
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
      window.location.href = "userinfo.php";
    }
  });
});
// const signupform = document.querySelector(".signupform");
// signupform.addEventListener("submit", function (event) {
// event.preventDefault();
//   const password2 = document.getElementById("password2").value;
//   const password3 = document.getElementById("password3").value;
//   if (password2 === password3) {
//     alertt2.classList.add("moveout");
//     alertwordss.innerHTML = "Đăng kí thành công!";
//     ads.classList.remove("active");
//     pagedangki.style.display = "none";
//     isSubmitted = true;
//     loginplace.classList.add("disappear");
//   } else {
//     alertwordss.innerHTML = "Mật khẩu xác nhận không dúng!";
//     alertt2.classList.add("moveout");
//   }
// });
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
//? this is for dropdown menu
///menu under btnmobile
// var menu1 = document.querySelector(".menu1");
// var menu1height = menu1.clientHeight;
// const homebtn = document.querySelector(".home");
// homebtn.addEventListener("click", function () {
//   console.log(menu1height);
//   if (menu1.clientHeight === 50) {
//     menu1.style.height = "auto";
//   } else {
//     console.log(menu1height);
//     menu1.style.height = "50px";
//   }
// });
// var menu2 = document.querySelector(".menu2");
// var menu2height = menu2.clientHeight;
// const btnon = document.querySelector(".btnon");
// btnon.addEventListener("click", function () {
//   console.log(menu2height);
//   if (menu2.clientHeight === 50) {
//     menu2.style.height = "auto";
//   } else {
//     menu2.style.height = "50px";
//   }
// });
// var menu3 = document.querySelector(".menu3");
// var menu3height = menu3.clientHeight;
// const btnluyen = document.querySelector(".btnluyen");
// btnluyen.addEventListener("click", function () {
//   console.log(menu2height);
//   if (menu3.clientHeight === 50) {
//     menu3.style.height = "auto";
//   } else {
//     menu3.style.height = "50px";
//   }
// });

///post comments
const commentButton = document.querySelector(".box-cmt button");
// commentButton.onclick = function () {
//   console.log(menu2height);
// };
commentButton.addEventListener("click", handleCreateComment);

function createCommentElement(name, content, avatarSrc) {
  const commentDiv = document.createElement("div");
  commentDiv.className = "people-cmt";

  const imgDiv = document.createElement("div");
  const img = document.createElement("img");
  img.src = avatarSrc;
  imgDiv.appendChild(img);

  const nameContentDiv = document.createElement("div");
  nameContentDiv.className = "name-cmt";

  const nameParagraph = document.createElement("p");
  nameParagraph.textContent = name;

  const contentParagraph = document.createElement("p");
  contentParagraph.textContent = content;

  nameContentDiv.appendChild(nameParagraph);
  nameContentDiv.appendChild(contentParagraph);

  commentDiv.appendChild(imgDiv);
  commentDiv.appendChild(nameContentDiv);

  return commentDiv;
}

function handleCreateComment() {
  console.log("create comment");
  const input = document.querySelector(".box-cmt input");
  const commentsContainer = document.querySelector(".cmt-container");
  const name = "NO Name"; // Change this to the commenter's name
  const content = input.value;
  const avatarSrc =
    "https://thuthuatnhanh.com/wp-content/uploads/2019/02/anh-dai-dien-dep-cho-zalo.jpeg"; // Change this to the commenter's avatar URL

  if (content.trim() !== "") {
    const newCommentElement = createCommentElement(name, content, avatarSrc);
    const firstCommentElement = commentsContainer.firstChild;
    // Nếu có phần tử comment đầu tiên, thì chèn newCommentElement trước nó
    if (firstCommentElement) {
      commentsContainer.insertBefore(newCommentElement, firstCommentElement);
    } else {
      // Nếu không có phần tử comment đầu tiên, thêm newCommentElement bình thường
      commentsContainer.appendChild(newCommentElement);
    }
    input.value = "";
  }
}
