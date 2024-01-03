//insert/update documents form
$(document).ready(function () {
  $(".form-insert").on("submit", function (event) {
    event.preventDefault();
    let namesub = $(".name-subject").val();
    let detailword = $(".detail-text").val();
    let idsub = $(".hidden_id").val();
    let filename = $(".name-file-subject").html();
    $.ajax({
      url: "funtionofPage/updateinadmin.php",
      type: "POST",
      data: {
        idsub,
        namesub,
        detailword,
        filename,
      },
      success: function (data) {
        var responejson = JSON.parse(data);
        if (responejson.message === "success") {
          //alert update success
          const Toast = Swal.mixin({
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Update successfully",
          });
          $(".blur-div").removeClass("moveout");
          $(".name-subject").val("");
          $(".detail-text").val("");
          $(".hidden_id").val("");
          $(".tablecontent").html("");
          responejson.data.forEach((value, key) => {
            const documentdiv = $(`
    <tr class="styled-table-tr">
      <td class="id-subject">
       ${value.id}
      </td>
      <td class="subject-word">
      ${value.subject}
      </td>
      <td class="decrip-word">
      ${value.decrip}
      </td>
      <td class="decrip-img">
      ${value.imgtest}
      </td>
      <td><span class="editacc insert-subject"><i class="fa-regular fa-pen-to-square"></i>Sửa</span>
        <span class="delacc delete-subject"><i class="fa-regular fa-trash-can"></i>Xóa</span>
      </td>
    </tr>`);
            $(".tablecontent").append(documentdiv);
          });
        }
      },
    });
  });
});
///get infor from doc_exam_test
$(document).ready(function () {
  var indexID;
  $(".table-list")
    .off("click")
    .on("click", ".insert-subject", function () {
      console.log("Insert");
      indexID = $(".insert-subject").index(this);
      var subjectname = $(".subject-word:eq(" + indexID + ")").html();
      var decripword = $(".decrip-word:eq(" + indexID + ")").html();
      console.log(subjectname);
      console.log(subjectname);
      $(".name-subject").val(subjectname.trim());
      $(".detail-text").val(decripword.trim());
      $(".hidden_id").val(
        $(".id-subject:eq(" + indexID + ")")
          .html()
          .trim()
      );
      $(".blur-div").addClass("moveout");
    });
});
//confirm delete inadmindoc
$(document).on("click", ".delete-subject", function () {
  var index2 = $(".delete-subject").index(this);
  console.log($(".id-subject:eq(" + index2 + ")").html());
  $(".confirm-whendelete").addClass("slideup");
  $(".primary-button")
    .off("click")
    .on("click", function () {
      $(".confirm-whendelete").removeClass("slideup");
    });
  $(".secondary-button")
    .off("click")
    .on("click", function () {
      console.log($(".id-subject:eq(" + index2 + ")").text());
      var idsubdel = $(".id-subject:eq(" + index2 + ")").html();
      $.ajax({
        url: "funtionofPage/updateinadmin.php",
        type: "POST",
        data: {
          idsubdel: idsubdel,
        },
        success: function (data) {
          $(".styled-table-tr:eq(" + index2 + ")").remove();
          const Toast = Swal.mixin({
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Update successfully",
          });
          setTimeout(function () {
            $(".confirm-whendelete").removeClass("slideup");
          }, 1000);
        },
      });
    });
});
//file-input onchange
$("#file-input").change(function () {
  var filename = $("#file-input")[0].files[0].name;
  $(".name-file-subject").html(`${filename}`);
});
