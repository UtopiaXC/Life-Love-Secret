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
    <title>Life&Love&Secret - 登录</title>
    <?php showDefaultHead(); ?>
</head>
<body>
<?php showDefaultScript();?>
<div class="wrapper hp_1">

    <?php showHeader(); ?>
    <?php showMenu(); ?>
    <section class="form_popup">

        <div class="login_form" id="login_form">
            <div class="hd-lg">
                <span>登录您的账户</span>
            </div><!--hd-lg end-->
            <div class="user-account-pr">
                <form>
                    <div class="input-sec">
                        <label style="display: none" for="username"></label>
                        <input type="text" id="username" name="username" placeholder="用户名">
                    </div>
                    <div class="input-sec">
                        <label style="display: none" for="password"></label>
                        <input type="Password" id="password" name="password" placeholder="密码">
                    </div>
                    <div class="chekbox-lg">
                        <label>
                            <input type="checkbox" name="remember" value="rem">
                            <b class="checkmark"> </b>
                            <span>Keep Login</span>
                        </label>
                    </div>
                    <div class="input-sec mb-0">
                        <button type="submit">登录</button>
                    </div><!--input-sec end-->
                </form>
                <a href="#" title="" class="fg_btn">忘记密码</a>
            </div><!--user-account end--->
            <div class="fr-ps">
                <h1>没有帐号？ <a href="signup.php" title="" class="show_signup">前往注册</a></h1>
            </div><!--fr-ps end-->
        </div><!--login end--->

    </section><!--form_popup end-->
    <?php showFooter();?>
</div><!--wrapper end-->


<?php showDefaultScript();?>
</body>
</html>