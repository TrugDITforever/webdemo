var tabmenu = document.querySelector(".tab-mainmenu");

const btnMobile = document.querySelector(".mobbilebtn");
btnMobile.addEventListener("click", function () {
  console.log(tabmenu.clientHeight);
  if (tabmenu.clientHeight === 40) {
    tabmenu.classList.add("addheight");
  } else {
    tabmenu.classList.remove("addheight");
  }
});
const tabmenuall = document.querySelectorAll(".tabmenu a");
tabmenuall.forEach(function (element) {
  element.addEventListener("click", function () {
    console.log("jkhhjasgfhj");
    tabmenu.classList.remove("addheight");
  });
});
///
window.addEventListener("scroll", appear);
function appear() {
  const opacity2 = document.querySelector(".opacity2");
  const opacity3 = document.querySelector(".opacity3");
  var scrollDistance = window.scrollY;
  if (scrollDistance >= 1500 && scrollDistance <= 1900) {
    opacity2.classList.add("bom");
    opacity3.classList.add("boom");
  } else {
    opacity2.classList.remove("bom");
    opacity3.classList.remove("boom");
  }
}

window.addEventListener("scroll", appear2);
function appear2() {
  const img1 = document.querySelectorAll(".img1");
  const img2 = document.querySelector(".img2");
  var scrolldis = window.scrollY;
  if (scrolldis >= 700 && scrolldis <= 1300) {
    img1.forEach(function (element) {
      element.classList.add("movee");
    });
    img2.classList.add("moveee");
  } else {
    img1.forEach(function (element) {
      element.classList.remove("movee");
    });
    img2.classList.remove("moveee");
  }
}

window.addEventListener("load", function () {
  const btnnext = document.querySelector(".fa-caret-right");
  const btnpre = document.querySelector(".fa-caret-left");
  const slideritems = document.querySelectorAll(".slideritems");
  const wrapperr = document.querySelector(".wrapper");
  const slideritemswidth = slideritems[0].offsetWidth;
  const sliderlength = slideritems.length;
  console.log("sliderlength", sliderlength);
  console.log("slideritemswidth", slideritemswidth);
  btnnext.addEventListener("click", function () {
    handlechange(1);
  });
  btnpre.addEventListener("click", function () {
    handlechange(-1);
  });
  let positionx = 0;
  let index = 0;
  function handlechange(direction) {
    if (direction === 1) {
      if (index >= sliderlength - 1) {
        index = sliderlength - 1;
        return;
      }
      positionx = positionx - slideritemswidth;
      wrapperr.style = `transform: translateX(  ${positionx}px)`;
      index++;
    } else if (direction === -1) {
      if (index <= 0) {
        index = 0;
        return;
      }
      positionx = positionx + slideritemswidth;
      wrapperr.style = `transform: translateX(  ${positionx}px)`;
      index--;
    }
  }
});
