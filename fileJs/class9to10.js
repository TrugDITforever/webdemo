$(document).ready(function () {
  $(".tasks-list-cb ").on("click", function (e) {
    let isSubmit = localStorage.getItem("isAppear");
    if (isSubmit === "false") {
      e.preventDefault();
      $(".alertword p").html("Đăng nhập vào để dùng chức năng này");
      $(".alert").addClass("moveout");
      setTimeout(function () {
        $(".alert").removeClass("moveout");
      }, 3000);
    } else {
      e.preventDefault();
      var index = $(".tasks-list-cb").index(this);
      var dataidtest = $(".all[data-id-test]:eq(" + index + ")").data(
        "id-test"
      );
      $.ajax({
        url: "../funtionofPage/checkingdone.php",
        type: "POST",
        data: {
          idpost: dataidtest,
        },
        success: function (res) {
          console.log(res);
          if (res === "true") {
            $(".tasks-list-cb:eq(" + index + ")").prop("checked", true);
          } else if (res == "false") {
            $(".tasks-list-cb:eq(" + index + ")").prop("checked", false);
          }
        },
      });
      // console.log(dataidtest);
    }
  });
});
