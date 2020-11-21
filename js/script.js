(function($) {
  
  "use strict";



    //  ==================== SCROLLING FUNCTION ====================

    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();
        if (scroll > 30) {
            $(".top_bar").addClass("scroll animated slideInDown");
        } else if (scroll < 30) {
            $(".top_bar").removeClass("scroll animated slideInDown")
        }
    });



    var header_height = $(".top_bar").innerHeight();

    $(".side_menu").css({
        "top": header_height
    });

    $(".menu").on("click", function(){
      $(".side_menu").toggleClass("active");
      return false;
    });

    $("html").on("click", function() {
        $(".side_menu").removeClass("active");
    });
    $(".menu, .side_menu").on("click", function(e){
        e.stopPropagation();
    });

    $(".user-log").on("click", function() {
        $(".account-menu").slideToggle();
    });
    $("html").on("click", function() {
        $(".account-menu").slideUp();
    });
    $(".user-log, .account-menu").on("click", function(e) {
        e.stopPropagation();
    });


    //  ==================== SCROLLING FUNCTION ====================
    
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })




})(window.jQuery);

function logout(){
    swal({
            title: "确定退出？",
            text: "您将注销您的帐号登录",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定！",
            cancelButtonText:"取消",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type: "POST",
                url: "api/standard_api.php",
                dataType: "json",
                data: {
                    "function": "logout"
                },
                success:function (result){
                    document.cookie = "TokenID" + "=" + "" + "; " + "-1";
                    document.cookie = "Token" + "=" + "" + "; " + "-1";
                    window.location="index.php";
                }
            });
        });
}

function hide(){
    $.ajax({
        type: "POST",
        url: "api/standard_api.php",
        dataType: "json",
        data: {
            "function": "change_hide"
        }
    });
}

