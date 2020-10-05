<?php
require_once "api/standard_display_api.php";
require_once "api/sql_api.php";
$conn=getConn();
if ($conn->connect_error){
    header('Location: ../error_pages/DatabaseErrorPage.html');
    exit;
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>Life&Love&Secret - 注册</title>
    <?php showDefaultHead(); ?>
</head>

<body>
<div class="wrapper hp_1">

    <?php showHeader(); ?>
    <?php showMenu(); ?>

    <section class="form_popup">

        <div class="signup_form" id="signup_form">
            <div class="hd-lg">
                <span>注册新账户</span>
            </div><!--hd-lg end-->
            <div class="user-account-pr">
                <form>
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
                        <button type="submit">注册</button>
                    </div><!--input-sec end-->
                </form>
                <div class="form-text">
                    <p>当您注册帐号时，我们默认您已同意 <a href="#" title="">社区规则</a> 与 <a href="#" title="">隐私协议</a></p>
                </div>
            </div><!--user-account end--->
            <div class="fr-ps">
                <h1>已经拥有账户？<a href="login.php" title="" class="show_signup"> 前往登录</a></h1>
            </div><!--fr-ps end-->
        </div><!--login end--->

    </section><!--form_popup end-->

    <?php showFooter(); ?>

</div><!--wrapper end-->

<?php showDefaultScript();?>
</body>
</html>