$(document).ready(function () {
  $(".tasks-list-cb ").on("click", function (e) {
    let isSubmit = localStorage.getItem("isAppear");
    if (isSubmit === "false") {
      e.preventDefault();
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
            $(".show-answer:eq(" + index + ")").addClass("show");
            $(".tasks-list-cb:eq(" + index + ")").prop("checked", true);
          } else if (res == "false") {
            $(".show-answer:eq(" + index + ")").removeClass("show");
            $(".tasks-list-cb:eq(" + index + ")").prop("checked", false);
          }
        },
      });
      // console.log(dataidtest);
    }
  });
});
