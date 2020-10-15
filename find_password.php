<?php
require_once "api/standard_display_api.php";
require_once "api/sql_api.php";
$conn = getConn();
if ($conn->connect_error) {
    header('Location: ../error_pages/DatabaseErrorPage.html');
    exit;
}
$result = $conn->query("SELECT * FROM web_message");
$Title = "";
while ($row = $result->fetch_assoc()) {
    if ($row['Title'] == "网站标题") {
        $Title = $row['Content'];
    }
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title><?php echo $Title ?> - 找回密码</title>
    <?php showDefaultHead(); ?>
</head>
<body>
<?php showDefaultScript(); ?>
<div class="wrapper hp_1">

    <?php showHeader($conn); ?>
    <?php showMenu($conn); ?>
    <section class="form_popup">
        <div class="login_form" id="login_form">
            <div class="hd-lg">
                <span>找回您的账户</span>
            </div><!--hd-lg end-->
            <div class="user-account-pr">
                <form method="post" onsubmit="return false;">
                    <div class="form-div">
                        <div class="input-sec">
                            <label style="display: none" for="username"></label>
                            <input type="text" id="username" name="username" placeholder="注册邮箱">
                        </div>
                        <div class="input-sec mb-0">
                            <button type="submit" onclick="submitFind()">找回</button>
                        </div><!--input-sec end-->
                    </div>
                </form>
            </div><!--user-account end--->
            <div class="fr-ps">
                <h1>没有帐号？ <a href="signup.php" title="" class="show_signup">前往注册</a></h1>
            </div><!--fr-ps end-->
        </div><!--login end--->

    </section><!--form_popup end-->
    <?php showFooter($conn); ?>
</div><!--wrapper end-->


<?php showDefaultScript(); ?>
</body>
<script>
    function submitFind() {
        var email = $('#username').val();
        var pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if (!pattern.test(email)) {
            swal({
                title: "警告",
                text: "你需要填写正确的邮箱信息",
                type: "warning"
            });
            return;
        }
        swal({
                title: "确认您的信息",
                text: "邮箱：" + email,
                type: "info",
                confirmButtonText: "提交重置",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function () {
                setTimeout(function () {
                    $.ajax({
                        type: "POST",
                        url: "api/standard_api.php",
                        dataType: "json",
                        data: {
                            "function": "find_password",
                            "email": email,
                        },
                        success: function (result) {
                            if (result.data.isSucceed === "成功") {
                                swal({
                                    title: "重置完成",
                                    text: "您的重置验证码已发送！请前往注册邮箱重置账户\n（如果未找到请查看邮箱垃圾桶）",
                                    type: "success",
                                }, function () {
                                    window.location = "login.php"
                                });
                            } else {
                                swal("错误！", "该邮箱不存在！", "error");
                            }
                        },
                        error: function () {
                            swal("抱歉！", "服务器异常", "error");
                        }
                    });
                });
            });
    }



</script>


</html>