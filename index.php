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
$result=$conn->query("SELECT UID,isBanned,isHidden FROM user WHERE Token='".$_COOKIE['Token']."' AND TokenID='".$_COOKIE['TokenID']."'");
$isLogin=false;
if ($result->num_rows==1){
    $isLogin=true;
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title><?php echo $Title ?> - 主页</title>
    <?php showDefaultHead(); ?>
    <style>
        body {
            background: #f2f2f2;
            color: #333;
        }
    </style>

</head>
<body>
<div class="wrapper hp_1">
    <?php showHeader($conn); ?>
    <?php showMenu($conn); ?>


    <?php
    $result = $conn->query("SELECT * FROM web_message");
    $ShowBanner = "";
    while ($row = $result->fetch_assoc()) {
        if ($row['Title'] == "显示首页banner") {
            $ShowBanner = $row['Content'];
        }
    }
    if ($ShowBanner == "是") {
        $result = $conn->query("SELECT * FROM web_message");
        $Welcome = "";
        while ($row = $result->fetch_assoc()) {
            if ($row['Title'] == "欢迎语句") {
                $Welcome = $row['Content'];
            }
        }
        echo "<section class='banner-section'>
        <div class='container'>
            <div class='banner-text'>
                <h2>$Welcome</h2>
                <a href='announcements.php' >查看公告</a>
            </div><!--banner-text end-->
        </div>
    </section><!--banner-section end-->";
    }
    ?>


    <section class="vds-main">
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    <h3><a href="confessions.php" id="text_confessions">表白墙</a></h3>
                    <span class="view-btn"><a href="<?php if ($isLogin) echo "add_new.php?type=confession"; else echo "login.php"?>" title="">添加留言</a>&nbsp&nbsp&nbsp&nbsp<a href="confessions.php" title="">查看全部</a></span>
                    <div class="vidz_list">
                        <div class="row" id="confession">
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    <h3><a href="secrets.php" id="text_secret">树洞</a></h3>
                    <span class="view-btn"><a href="<?php if ($isLogin) echo "add_new.php?type=secret"; else echo "login.php"?>" title="">添加留言</a>&nbsp&nbsp&nbsp&nbsp<a href="secrets.php" title="">查看全部</a></span>
                    <div class="vidz_list">
                        <div class="row" id="secret">
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    <h3><a href="founds.php" id="text_found">失物招领</a></h3>
                    <span class="view-btn"><a href="<?php if ($isLogin) echo "add_new.php?type=found"; else echo "login.php"?>" title="">添加留言</a>&nbsp&nbsp&nbsp&nbsp<a href="founds.php" title="">查看全部</a></span>
                    <div class="vidz_list">
                        <div class="row" id="found">
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    <h3><a href="transactions.php" id="text_transaction">校内交易</a></h3>
                    <span class="view-btn"><a href="<?php if ($isLogin) echo "add_new.php?type=transaction"; else echo "login.php"?>" title="">添加留言</a>&nbsp&nbsp&nbsp&nbsp<a href="transactions.php" title="">查看全部</a></span>

                    <div class="vidz_list">
                        <div class="row" id="transaction">
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
        <div class="vidz-row pop_channels">
            <div class="container">
                <div class="vidz_sec">
                    <h3>随意链接</h3>
                    <div class="vidz_list">
                        <div class="row" id="users">
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
    </section><!--vds-main end-->

    <?php showFooter($conn); ?>
</div><!--wrapper end-->
<?php showDefaultScript(); ?>
</body>
<script>
    $.ajax({
        type: "post",
        url: "api/standard_api.php",
        dataType: "json",
        data: {
            "function": "main_page"
        },
        success: function (result) {
            for (i=0;i<result.data.confession.confession_count;i++){
                addConfession("confession",result.data.confession[i].LID,
                    result.data.confession[i].Title,
                    result.data.confession[i].UserName,
                    result.data.confession[i].UID,
                    result.data.confession[i].Likes,
                    result.data.confession[i].SubmitTime);
            }
            if (result.data.confession.confession_count===0){
                showNone("confession");
            }
            for (i=0;i<result.data.secret.secret_count;i++){
                addConfession("secret",result.data.secret[i].SID,
                    result.data.secret[i].Title,
                    result.data.secret[i].UserName,
                    result.data.secret[i].UID,
                    result.data.secret[i].Likes,
                    result.data.secret[i].SubmitTime);
            }
            if (result.data.secret.secret_count===0){
                showNone("secret");
            }
            for (i=0;i<result.data.found.found_count;i++){
                addConfession("found",result.data.found[i].FID,
                    result.data.found[i].Title,
                    result.data.found[i].UserName,
                    result.data.found[i].UID,
                    result.data.found[i].Likes,
                    result.data.found[i].SubmitTime);
            }
            if (result.data.found.found_count===0){
                showNone("found");
            }
            for (i=0;i<result.data.transaction.transaction_count;i++){
                addConfession("transaction",result.data.transaction[i].TID,
                    result.data.transaction[i].Title,
                    result.data.transaction[i].UserName,
                    result.data.transaction[i].UID,
                    result.data.transaction[i].Likes,
                    result.data.transaction[i].SubmitTime);
            }
            if (result.data.transaction.transaction_count===0){
                showNone("transaction");
            }
            for (i=0;i<result.data.user.user_count;i++){
                addUser(result.data.user[i].UserName,
                    result.data.user[i].Avatar,
                    result.data.user[i].UID);
            }
        }
    });
    function addConfession(element,link,title,username,userlink,likes,time){
        var div=document.getElementById(element);
        var id="";
        if (element==="confession")
            id="LID";
        else if(element==="secret")
            id="SID";
        else if (element==="found")
            id="FID";
        else if (element==="transaction")
            id="TID";
        div.innerHTML+=`    <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
        <div class="videoo">
            <div class="video_info">
                <h3><a href="${element}.php?${id}=${link}" title="">${title}</a></h3>
                <h4><a href="center.php?UID=${userlink}" title="">${username}</a></h4>
                <span>${likes}赞<small class="posted_dt">${time}</small></span>
            </div>
        </div><!--videoo end-->
    </div>`;
    }
    function showNone(element){
        var line=document.getElementById("text_"+element);
        line.innerText+='（当前板块无留言！）';
    }
    function addUser(username,Avatar,UID){
        var div=document.getElementById("users");
        div.innerHTML=' <div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">' +
            '               <div class="videoo">' +
            '                   <div class="vid_thumbainl">' +
            '                       <a href="center.php?UID='+UID+'">' +
            '                           <img src="'+Avatar+'" alt="">' +
            '                       </a>' +
            '                   </div><!--vid_thumbnail end-->' +
                '               <div class="video_info">' +
                '                   <h3><a href="center.php?UID='+UID+'">'+username+'</a></h3>' +
                '               </div>' +
            '               </div><!--videoo end-->' +
            '           </div>';
    }
</script>
</html>