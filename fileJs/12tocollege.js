const review = document.querySelector(".review");
const test = document.querySelector(".test");
const loginplacee = document.querySelector(".outsideloginplace");
const hovera = document.querySelectorAll(".read a");
const alertt = document.querySelector(".alert");
const alertword = document.querySelector(".alertword a");
const alertwords = document.querySelector(".alertword p");
function showReview() {
  alertword.addEventListener("click", function () {
    alertt.classList.remove("moveout");
  });
  $(".read a").click(function () {
    var index;
    const isSubmitted = localStorage.getItem("isAppear");
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
        title: "Cần đăng nhập để dùng chức năng này",
      });
    } else if (isSubmitted === "true") {
      index = $(".read a").index(this);
      const idexam = $("a[data-id-exam]:eq(" + index + ")").data("id-exam");
      $.ajax({
        url: "funtionofPage/getExamimg.php",
        type: "POST",
        data: { idexam: idexam },
        success: function (res) {
          const resposne = JSON.parse(res);
          if (resposne.message === "success") {
            $(".review").addClass("opacity");
            const imgtest = resposne.data.imgtest;
            $(".test img").attr("src", `uploadfile/${imgtest}`);
            $(".ads").addClass("active");
            document.body.style.overflow = "hidden";
          }
        },
      });
    }
  });
  ads.addEventListener("click", function (event) {
    var targetElement = event.target;
    if (targetElement != review) {
      ads.classList.remove("active");
      review.classList.remove("opacity");
      test.classList.remove("appearrr");
      document.body.style.overflow = "auto";
    }
  });
  const tabmenuall = document.querySelectorAll(".tabmenub");
  tabmenuall.forEach(function (element) {
    element.addEventListener("click", function () {
      tabmenu.classList.remove("addheight");
    });
  });
}
showReview();
//btn down in 12tocolleage.php
$(document).ready(function () {
  let isSubmit = localStorage.getItem("isAppear");
  $(".down_test").on("click", function (event) {
    if (isSubmit === "false") {
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
