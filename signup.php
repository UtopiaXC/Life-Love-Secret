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
$useEmail="";
while ($row = $result->fetch_assoc()) {
    if ($row['Title'] == "网站标题") {
        $Title = $row['Content'];
    }
    if ($row['Title']=="使用邮箱"){
        $useEmail=$row['Content'];
    }
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title><?php echo $Title ?> - 注册</title>
    <?php showDefaultHead(); ?>


</head>

<body>
<div class="wrapper hp_1">

    <?php showHeader($conn); ?>
    <?php showMenu($conn); ?>

    <section class="form_popup">

        <div class="signup_form" id="signup_form">
            <div class="hd-lg">
                <span>注册新账户</span>
            </div><!--hd-lg end-->
            <div class="user-account-pr">
                <div class="form-div">
                    <div class="input-sec mgb25">
                        <label style="display: none" for="username"></label>
                        <input type="text" id="username" name="username" placeholder="用户名">
                    </div>
                    <div class="input-sec">
                        <label style="display: none" for="email"></label>
                        <input type="email" id="email" name="email" placeholder="邮箱">
                    </div>
                    <div class="input-sec">
                        <label style="display: none" for="password"></label>
                        <input type="Password" id="password" name="password" placeholder="密码">
                    </div>
                    <div class="input-sec">
                        <label style="display: none" for="confirm-password"></label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="重复密码">
                    </div>
                    <div class="input-sec mb-0">
                        <button onclick="submitRegister()">注册</button>
                    </div><!--input-sec end-->
                    <div class="form-text">
                        <p>当您注册帐号时，我们默认您已同意 <a href="rules.php" target="_blank">社区规则</a> 与 <a href="privacy.php" target="_blank">隐私协议</a></p>
                    </div>
                </div>
            </div><!--user-account end--->
            <div class="fr-ps">
                <h1>已经拥有账户？<a href="login.php" title="" class="show_signup"> 前往登录</a></h1>
            </div><!--fr-ps end-->
        </div><!--login end--->

    </section><!--form_popup end-->

    <?php showFooter($conn); ?>

</div><!--wrapper end-->

<?php showDefaultScript(); ?>

</body>
<script>
    function submitRegister() {
        const username = $("#username").val();
        const email = $("#email").val();
        const password = $("#password").val();
        const password_twice = $("#confirm-password").val();
        if (username === "" || email === "" || password === "" || password_twice === "") {
            swal("警告", "您有未填写的内容！", "warning");
            return false;
        }
        var pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if (!pattern.test(email)){
            swal("警告", "您的邮箱格式不正确！", "warning");
            return false;
        }
        pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,26}$/;
        if (!pattern.test(password)){
            swal("警告", "您的密码不符合要求！\n您的密码需要在8～26位之间，且必须包含至少各一个大写字母、小写字母和数字", "warning");
            return false;
        }
        if (password !== password_twice) {
            swal("警告", "您输入的两次密码不一致！", "warning");
            return false;
        }
        swal({
                title: "确认您的信息",
                text: "用户名：" + username + "\n邮箱：" + email,
                type: "info",
                confirmButtonText: "提交注册",
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
                            "function": "register",
                            "username": username,
                            "email": email,
                            "password": password
                        },
                        success: function (result) {
                            if (result.data.isSucceed === "成功")
                                swal({
                                    title: "注册完成",
                                    <?php
                                    if ($useEmail=="是"){
                                        echo '
                                        text: "您的帐号已注册！请前往注册邮箱激活账户\n（如果未找到请查看邮箱垃圾桶）",
                                        ';
                                    }else
                                        echo '
                                        text: "您的帐号已注册！请前往登录",
                                        ';

                                    ?>
                                    type: "success",
                                },function (){window.location="login.php"});
                            else
                                swal("注册失败", result.data.isSucceed, "error");
                        },
                        error: function () {
                            swal("抱歉！", "服务器异常", "error");
                        }
                    });
                });
            })

    }
</script>


</html>