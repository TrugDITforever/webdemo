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
//get number of user
$(document).ready(function () {
  $(".id_useracc").length;
  $(".number-user").html($(".id_adminacc").length);
  $("id-subject").length;
  $(".number-doc").html($(".id-subject").length);
});

//insert/update for ADMIN(parent)
$(document).ready(function () {
  $(".adminbtn").click(function () {
    $(".blur-div").addClass("moveout");
  });
  $(".formInadmin i").click(function () {
    $(".blur-div").removeClass("moveout");
    $(".id_admin").val("");
    $(".adminname").val("");
    $(".adminpass").val("");
  });
  $(".formInadmin").on("submit", function (e) {
    e.preventDefault();
    const idadminacc = $(".id_admin").val();
    const adminname = $(".adminname").val();
    const adminpass = $(".adminpass").val();
    const adminaccess = $(".adminaccess").val();
    const container = { idadminacc, adminname, adminpass, adminaccess };
    console.log(container);
    $.ajax({
      url: "./funtionofPage/eventOfadmin/editadmin.php",
      type: "POST",
      data: container,
      success: function (res) {
        console.log(res);
        if (res === "success") {
          $(".blur-div").removeClass("moveout");
          setTimeout(function () {
            window.location.reload();
          }, 2000);
        } else {
          $(".errorword").text("Hãy kiểm tra lại tên người dùng");
        }
      },
    });
  });
});
///buttton editadmin inadminpage
$(document).ready(function () {
  var index;
  $(".editadmin").click(function (e) {
    $(".blur-div").addClass("moveout");
    index = $(".editadmin").index(this);
    const id = $(".id_adminacc:eq(" + index + ")")
      .html()
      .trim();
    $(".id_admin").val(id);
    $(".adminname").val(
      $(".admin_name:eq(" + index + ")")
        .html()
        .trim()
    );
    $(".adminpass").val(
      $(".admin_pass:eq(" + index + ")")
        .html()
        .trim()
    );
    $(".adminaccess").val(
      $(".admin_role:eq(" + index + ")")
        .html()
        .trim()
    );
  });
});
///button confirm and cancel in adminpage
$(document).on("click", ".deladmin", function () {
  var index2 = $(".deladmin").index(this);
  console.log($(".id_adminacc:eq(" + index2 + ")").html());
  $(".confirm-whendelete").addClass("slideup");
  $(".admincancel")
    .off("click")
    .on("click", function () {
      $(".confirm-whendelete").removeClass("slideup");
    });
  $(".adminconfirm")
    .off("click")
    .on("click", function () {
      console.log($(".id_adminacc:eq(" + index2 + ")").text());
      var idadminacc = $(".id_adminacc:eq(" + index2 + ")").html();
      $.ajax({
        url: "funtionofPage/updateinadmin.php",
        type: "POST",
        data: {
          idadminacc: idadminacc,
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
