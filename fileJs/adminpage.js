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
  $(".insert-subject").click(function () {
    var index = $(".insert-subject").index(this);
    $(".blur-div").addClass("moveout");
    $(".name-subject").val($(".subject-word:eq(" + index + ")").text());
    $(".detail-text").val($(".decrip-word:eq(" + index + ")").text());
    $(".hidden_id").val($(".id-subject:eq(" + index + ")").text());
  });
});

$(document).on("click", ".delete-subject", function () {
  var index2 = $(".delete-subject").index(this);
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
      var idsubdel = $(".id-subject:eq(" + index2 + ")").text();
      $.ajax({
        url: "funtionofPage/updateinadmin.php",
        type: "POST",
        data: {
          idsubdel: idsubdel,
        },
        success: function (data) {
          console.log(data);
          $(".styled-table-tr:eq(" + index2 + ")").remove();
          setTimeout(function () {
            $(".confirm-whendelete").removeClass("slideup");
          }, 1000);
        },
      });
    });
});
$(document).ready(function () {
  $(".id_useracc").length;
  $(".number-user").html($(".id_useracc").length);
  $("id-subject").length;
  $(".number-doc").html($(".id-subject").length);
});
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
        console.log(data);
        if (data === "success") {
          $(".blur-div").removeClass("moveout");
          $(".name-subject").val("");
          $(".detail-text").val("");
        }
      },
      error: function (xhr, status, error) {
        console.log(error);
        console.log(xhr.responseText);
        console.log(status);
      },
    });
  });
});
