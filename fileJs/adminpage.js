$(document).ready(function () {
  $(".user-profile").on("click", function () {
    $(".boxshowlist:nth-child(1)").addClass("fadeout");
    $(".boxshowlist:nth-child(2)").addClass("appear2");
    $(".boxshowlist:nth-child(3)").removeClass("appear3");
  });
  $(".user-accbtn").on("click", function () {
    $(".boxshowlist:nth-child(1)").removeClass("fadeout");
    $(".boxshowlist:nth-child(2)").removeClass("appear2");
    $(".boxshowlist:nth-child(3)").removeClass("appear3");
  });
  $(".btn-test").on("click", function () {
    $(".boxshowlist:nth-child(1)").removeClass("fadeout");
    $(".boxshowlist:nth-child(2)").removeClass("appear2");
    $(".boxshowlist:nth-child(3)").addClass("appear3");
  });
});
$(document).ready(function () {
  $(".list-menu li").click(function () {
    var index = $(".list-menu li").index(this);
    $(".list-menu li").removeClass("hoveradd");
    $(".list-menu li:eq(" + index + ")").addClass("hoveradd");
  });
});
//function form appear
$(document).ready(function () {
  $(".form-insert i").click(function () {
    $(".blur-div").removeClass("moveout");
    $(".name-subject").val("");
    $(".detail-text").val("");
  });
  $(".btn-inserttest button").click(function () {
    $(".blur-div").addClass("moveout");
  });
});

///get infor from Test
$(document).ready(function () {
  $(".tablecontent").on("click", ".insert-subject", function () {
    console.log("Insert");
    var indexID = $(".insert-subject").index(this);
    $(".blur-div").addClass("moveout");
    $(".name-subject").val(
      $(".subject-word:eq(" + indexID + ")")
        .text()
        .trim()
    );
    $(".detail-text").val(
      $(".decrip-word:eq(" + indexID + ")")
        .text()
        .trim()
    );
    $(".hidden_id").val(
      $(".id-subject:eq(" + indexID + ")")
        .text()
        .trim()
    );
  });
});
//confirm delete
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
          setTimeout(function () {
            $(".confirm-whendelete").removeClass("slideup");
          }, 1000);
        },
      });
    });
});
//get number of user
$(document).ready(function () {
  $(".id_useracc").length;
  $(".number-user").html($(".id_useracc").length);
  $("id-subject").length;
  $(".number-doc").html($(".id-subject").length);
});
//insert/update documents form
$(document).ready(function () {
  $(".form-insert").on("submit", function (event) {
    event.preventDefault();
    let namesub = $(".name-subject").val();
    let detailword = $(".detail-text").val();
    let idsub = $(".hidden_id").val();
    $.ajax({
      url: "funtionofPage/updateinadmin.php",
      type: "POST",
      data: {
        idsub,
        namesub,
        detailword,
      },
      success: function (data) {
        var responejson = JSON.parse(data);
        if (responejson.message === "success") {
          $(".blur-div").removeClass("moveout");
          $(".name-subject").val("");
          $(".detail-text").val("");
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
