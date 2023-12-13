///button confirm and cancel in adminpost-acc
$(document).on("click", ".adminpost-btn-useracc-delete", function () {
  var index2 = $(".adminpost-btn-useracc-delete").index(this);
  console.log($(".id_useracc:eq(" + index2 + ")").html());
  $(".confirm-whendelete").addClass("slideup");
  $(".adminpost-cancel")
    .off("click")
    .on("click", function () {
      $(".confirm-whendelete").removeClass("slideup");
      Swal.fire({
        icon: "success",
        title: "Xóa thành công!",
      });
    });
  $(".adminpost-confirm")
    .off("click")
    .on("click", function () {
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
            $(".styled-table tr:eq(" + index2 + ")").remove();

            setTimeout(function () {
              $(".confirm-whendelete").removeClass("slideup");
            }, 1000);
          }
        },
      });
    });
});
$("document").ready(function () {
  var index;
  $(".deletepost").on("click", function () {
    index = $(".deletepost").index(this);
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
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
