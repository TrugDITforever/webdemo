const btnDangNhap = document.getElementById("btn");
const pagedangnhap = document.querySelector(".Page-login");
const exitbtn = document.getElementById("close");
const btnDangki = document.getElementById("btn2");
const pagedangki = document.getElementById("Page-signup");
const exitbtn2 = document.getElementById("close2");
const btnmovetosignup = document.getElementById("movetosignup");
const btnmovetologin = document.getElementById("btnmovetologin");
var header = document.querySelector(".head");
var headerheight = header.offsetHeight;
var tabmenu = document.querySelector(".tab-mainmenu");
const ads = document.querySelector(".ads");

window.addEventListener("scroll", function () {
  var scrollDistance = window.scrollY;
  if (scrollDistance >= 100) {
    header.classList.add("hide");
    tabmenu.classList.add("padd");
  } else {
    header.classList.remove("hide");
    tabmenu.classList.remove("padd");
  }
});
// scroll of infor
const arrow = document.querySelector(".arrow");
const infor = document.querySelector(".infor");
infor.addEventListener("scroll", function () {
  var scroll = infor.scrollTop;
  if (scroll >= 100) {
    arrow.classList.add("appear");
  } else {
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
var downloadLinks = document.getElementsByClassName("down");
for (var i = 0; i < downloadLinks.length; i++) {
  downloadLinks[i].addEventListener("click", function (event) {
    event.preventDefault();
    var link = this;
    link.innerHTML = "Đã tải xuống";
    var fileURL = link.getAttribute("href");
    var fileName = fileURL.split("/").pop();
    var element = document.createElement("a");
    element.setAttribute("href", fileURL);
    element.setAttribute("download", fileName);
    element.style.display = "none";
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
    const btndown = document.querySelectorAll(".btndown");
    btndown.forEach(function (element) {
      console.log(`btndown.length`);
      element.addEventListener("click", function () {
        element.classList.add("changee");
      });
    });
  });
}

//event when login
const alertwordss = document.querySelector(".alertword p");
const loginFormm = document.getElementById("loginform");
const alertt2 = document.querySelector(".alert");
const alertword2 = document.querySelector(".alertword a");
const loginplace = document.querySelector(".outsideloginplace");
alertword2.addEventListener("click", function () {
  alertt2.classList.remove("moveout");
});
let isSubmitted = false;
loginFormm.addEventListener("submit", function (event) {
  event.preventDefault();
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  if (username === "admin" && password === "123456") {
    alertt2.classList.add("moveout");
    alertwordss.innerHTML = "Đăng nhập thành công!";
    ads.classList.remove("active");
    pagedangnhap.style.display = "none";
    isSubmitted = true;
    loginplace.classList.add("disappear");
  } else {
    alertwordss.innerHTML = "Tên đăng nhập hoặc mật khẩu không đúng!";
    alertt2.classList.add("moveout");
  }
});
// even when sign up
const signupform = document.querySelector(".signupform");
signupform.addEventListener("submit", function (event) {
  event.preventDefault();
  const password2 = document.getElementById("password2").value;
  const password3 = document.getElementById("password3").value;
  if (password2 === password3) {
    alertt2.classList.add("moveout");
    alertwordss.innerHTML = "Đăng kí thành công!";
    ads.classList.remove("active");
    pagedangki.style.display = "none";
    isSubmitted = true;
    loginplace.classList.add("disappear");
  } else {
    alertwordss.innerHTML = "Mật khẩu xác nhận khác với mật khẩu!";
    alertt2.classList.add("moveout");
  }
});
const box = document.querySelectorAll(".box");
const word = document.querySelector(".wordd p");
window.addEventListener("load", function () {
  const boxlenght = box.length;
  word.innerHTML = `${boxlenght} tài liệu`;
});
//12tocollege js
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
    console.log("vsdhgsvdhfg");
    if (isSubmitted === false) {
      alertwords.innerHTML = "Bạn cần đăng nhập vào trang để xem tài liệu này";
      alertt.classList.add("moveout");
    } else if (isSubmitted === true) {
      if (element === hovera[0]) {
        console.log(hovera.length);
        ads.classList.add("active");
        revew.classList.add("opacity");
        test1.classList.add("appearrr");
      }
      if (element === hovera[1]) {
        console.log(hovera.length);
        ads.classList.add("active");
        revew.classList.add("opacity");
        test2.classList.add("appearrr");
      }
      if (element === hovera[2]) {
        ads.classList.add("active");
        console.log(hovera.length);
        revew.classList.add("opacity");
        test3.classList.add("appearrr");
      }
      if (element === hovera[3]) {
        ads.classList.add("active");
        console.log(hovera.length);
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

//btn mobile
const btnMobile = document.querySelector(".mobbilebtn");
btnMobile.addEventListener("click", function () {
  console.log(tabmenu.clientHeight);
  if (tabmenu.clientHeight === 40) {
    tabmenu.classList.add("addheight");
  } else {
    tabmenu.classList.remove("addheight");
  }
});
const tabmenuall = document.querySelectorAll(".tabmenub");
tabmenuall.forEach(function (element) {
  element.addEventListener("click", function () {
    console.log("jkhhjasgfhj");
    tabmenu.classList.remove("addheight");
  });
});
///menu under btnmobile
var menu1 = document.querySelector(".menu1");
var menu1height = menu1.clientHeight;
const homebtn = document.querySelector(".home");
homebtn.addEventListener("click", function () {
  if (menu1.clientHeight === 50) {
    menu1.style.height = "auto";
  } else {
    menu1.style.height = "50px";
  }
});
var menu2 = document.querySelector(".menu2");
var menu2height = menu2.clientHeight;
const btnon = document.querySelector(".btnon");
btnon.addEventListener("click", function () {
  console.log(menu2height);
  if (menu2.clientHeight === 50) {
    menu2.style.height = "auto";
  } else {
    menu2.style.height = "50px";
  }
});
var menu3 = document.querySelector(".menu3");
var menu3height = menu3.clientHeight;
const btnluyen = document.querySelector(".btnluyen");
btnluyen.addEventListener("click", function () {
  console.log(menu2height);
  if (menu3.clientHeight === 50) {
    menu3.style.height = "auto";
  } else {
    menu3.style.height = "50px";
  }
});
