function showReview() {
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
        alertwords.innerHTML =
          "Bạn cần đăng nhập vào trang để xem tài liệu này";
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
}
showReview();
