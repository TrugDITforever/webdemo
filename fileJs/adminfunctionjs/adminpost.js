///button confirm and cancel in adminpost-acc
$(document).on("click", ".adminpost-btn-useracc-delete", function () {
  var index2 = $(".adminpost-btn-useracc-delete").index(this);
  var delwo = $(".del-wo:eq(" + index2 + ")").html();
  $(".confirm-whendelete").addClass("slideup");
  /// cancel button
  $(".adminpost-cancel")
    .off("click")
    .on("click", function () {
      $(".confirm-whendelete").removeClass("slideup");
    });
  /// confirm button
  $(".adminpost-confirm")
    .off("click")
    .on("click", function () {
      $(".confirm-whendelete").removeClass("slideup");
      console.log($(".id_useracc:eq(" + index2 + ")").text());
      var iduseracc = $(".id_useracc:eq(" + index2 + ")").html();
      $.ajax({
        url: "funtionofPage/updateinadmin.php",
        type: "POST",
        data: {
          iduseracc: iduseracc,
        },
        success: function (data) {
          const res = JSON.parse(data);
          if (res.message == "success") {
            /// change button text
            if (delwo == "Bỏ chặn") {
              $(".del-wo:eq(" + index2 + ")").html("Chặn");
            } else if (delwo == "Chặn") {
              $(".del-wo:eq(" + index2 + ")").html("Bỏ chặn");
            }
            Swal.fire({
              icon: "success",
              title: "Cập nhật thành công!",
            });
            setTimeout(function () {
              $(".confirm-whendelete").removeClass("slideup");
            }, 1000);
          }
        },
      });
    });
});
//delete userpost
$("document").ready(function () {
  var index;
  $(".deletepost").on("click", function () {
    index = $(".deletepost").index(this);
    Swal.fire({
      title: "Chắc chắn xóa!?",
      text: "Không thể khôi phục sau hành động này!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Hủy bỏ",
      confirmButtonText: "Xác nhận xóa!",
    }).then((result) => {
      if (result.isConfirmed) {
        const idpost = $("a[data-post-id]:eq(" + index + ")").data("post-id");
        $.ajax({
          url: "funtionofPage/updateinadmin.php",
          type: "POST",
          data: {
            idpost: idpost,
          },
          success: function (response) {
            console.log(response);
            if (response === "success") {
              $(".containerPost:eq(" + index + ")").remove();
              Swal.fire({
                title: "Deleted!",
                text: "Post has been deleted.",
                icon: "success",
              });
            }
          },
        });
      }
    });
  });
});
function deleteCmtuser() {
  var index;
  $(".cmt-del-btn").on("click", function () {
    index = $(".cmt-del-btn").index(this);
    Swal.fire({
      title: "Chắc chắn xóa!?",
      text: "Không thể khôi phục sau hành động này!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Hủy bỏ",
      confirmButtonText: "Xác nhận xóa!",
    }).then((result) => {
      if (result.isConfirmed) {
        const idcmt = $(
          ".user-comment-name[data-id-cmt]:eq(" + index + ")"
        ).data("id-cmt");
        $.ajax({
          url: "funtionofPage/updateinadmin.php",
          type: "POST",
          data: {
            idcmt: idcmt,
          },
          success: function (response) {
            console.log(response);
            if (response === "success") {
              $(".User-comment-contain:eq(" + index + ")").remove();
              Swal.fire({
                title: "Deleted!",
                text: "Xóa thành công",
                icon: "success",
              });
            }
          },
        });
      }
    });
  });
}
deleteCmtuser();
//getnumber user
$(document).ready(function () {
  var numberusser = $(".id_useracc").length;
  $(".number-user").html(numberusser);
  // $("id-subject").length;
  // $(".number-doc").html($(".id-subject").length);
});
