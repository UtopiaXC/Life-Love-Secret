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
    <title><?php echo $Title ?> - 表白</title>
    <?php showDefaultHead(); ?>
    <style>
        body {
            background: #f2f2f2;
            color: #333;
        }
        .highlight{
            color: #5200bf;
        }
    </style>

</head>
<body>
<div class="wrapper hp_1">
    <?php showHeader($conn); ?>
    <?php showMenu($conn); ?>

    <section class="mn-sec full_wdth_single_video">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="mn-vid-sc single_video">
                        <div class="vid-1">
                            <div class="vid-info">
                                <h3 id="confession_title">FAQ 问答帮助</h3>
                                <div class="info-pr">

                                    <div class="clearfix"></div>
                                </div><!--info-pr end-->
                            </div><!--vid-info end-->
                        </div><!--vid-1 end-->
                    </div><!--mn-vid-sc end--->
                    <div class="amazon">
                        <div class="abt-amz">
                            <div class="amz-hd">
                                <h1 style="font-size: x-large">一、什么是Life&Love&Secret</h1>
                                <br><h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="highlight" target="_blank" href="https://www.github.com/UtopiaXC/Life-Love-Secret/">Life&Love&Secret</a>是一款由<a class="highlight" target="_blank" href="https://github.com/UtopiaXC">个人开发者UtopiaXC</a>开发的完全开源（采用<a class="highlight" target="_blank" href="https://github.com/UtopiaXC/Life-Love-Secret/blob/master/LICENSE">MIT许可</a>）的可一键式部署的面向校园的综合生活论坛。</h2>
                                <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp论坛包括四大模块：即表白墙、树洞、失物招领以及校内交易。用户可自主注册，发布内容等。同时引入监管机制，防止不良信息传播。</h2>
                                <br><br>
                                <h1 style="font-size: x-large">二、如何在服务器上部署Life&Love&Secret</h1>
                                <br><h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp目前，Life&Love&Secret采用Git拉取部署模式，即通过Git下载全部源码进行全自动部署。部署前情确认服务器已经部署Web服务器应用（Nginx（推荐）或Apache等）、PHP应用服务器（推荐版本7.4）与MySQL数据库服务器（仅MySQL8.0）。</h2>
                                <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp此外，待整体编写结束且稳定后，将推出Docker容器以便一键式部署。</h2>
                                <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp具体部署方式请前往Github调阅相关文档。</h2>
                                <br><br>
                                <h1 style="font-size: x-large">三、如何注册账户</h1>
                                <br><h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp目前，仅支持使用邮箱注册的形式进行账户注册。如果管理员开启了邮箱验证，则在注册后需要接收注册邮件来激活您的账户。如果管理员开启了邮箱验证，您在注册时却未接收到邮件，您应该先检查激活邮件是否被识别为了垃圾邮件并前往垃圾箱查看。如果依旧未获取到激活邮件，则请联系相应部署网站的管理员进行反馈。</h2>
                                <br><br>
                                <h1 style="font-size: x-large">四、您的信息是否会被他人获取</h1>
                                <br><h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp首先，需要您知悉，在互联网中，只要接入公共网络连接就一定存在网络安全风险。我在开发时，已经尽可能避免了由于低级错误导致的安全性问题，例如简单SQL注入，明文密码与令牌保存等。但是，不能排除由于我代码水平问题导致的安全性问题。同时，数据安全还取决于部署服务器的安全性，例如是否开启SSL，是否对中间人攻击进行防御，是否将数据库开放了公共访问等。</h2>
                                <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp不过，您可以放心的是，我在开发时已经对敏感信息进行了加密处理，例如您的密码、令牌等。这些信息的加密采用了一种单向的无法回复的方式，当然，如此也不能完全排除安全隐患，比如字典碰撞等方式依旧可以获取到这些关键信息。因此，我建议您在不同网站所设置的密码尽量不要相同。此外，关于您的个人信息，我们不强制性要求填写，选择填写、公开这些信息是您的权利，任何组织和个人不得不经允许私自利用这些信息侵害您的个人合法权益。如果存在非法行为，请您积极维权。</h2>
                                <br><br>
                                <h1 style="font-size: x-large">五、是否可以发布违反相关规定或法律的内容</h1>
                                <br><h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp网络不是法外之地，请您谨言慎行。如果您的言论存在违反法律或相关规定的内容，网站运营者有责任对您进行处理、通报或通知公安机关。用户的一切违法行为由用户和网站运营商承担责任，与开发者UtopiaXC没有任何关系。</h2>
                                <br><br>
                                <h1 style="font-size: x-large">六、其他问题</h1>
                                <br><h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp其他问题请参考<a class="highlight" href="rules.php">社区规则（用户协议）</a>和<a class="highlight" href="privacy.php">隐私协议</a>。如果未能解决您的问题，如果是关于网站运营的问题您可通过点击头像菜单中的反馈将问题反馈到网站运营商处。如果是关于程序、源码上的问题请在GitHub提交Issue或通过邮件与我联系。</h2>
                            </div><!--amz-hd end-->
                            <div class="clearfix"></div>
                        </div><!--abt-amz end-->
                    </div><!--amazon end-->
                </div><!---col-lg-9 end-->
            </div>
        </div>

    </section><!--mn-sec end-->


    <?php showFooter($conn); ?>
</div><!--wrapper end-->


<?php showDefaultScript(); ?>
</body>
</html>