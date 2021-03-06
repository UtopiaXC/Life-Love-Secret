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
    <title><?php echo $Title ?> - 校内交易</title>
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

    <section class="mn-sec full_wdth_single_video">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="mn-vid-sc single_video">
                        <div class="vid-1">
                            <div class="vid-info">
                                <h3 id="transaction_title"></h3>
                                <div class="info-pr">
                                    <ul class="pr_links">
                                        <li>
                                            <button data-toggle="tooltip" data-placement="top" title="I like this">
                                                <i class="icon-thumbs_up_fill"></i>
                                            </button>
                                            <span id="transaction_likes"></span>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div><!--info-pr end-->
                            </div><!--vid-info end-->
                        </div><!--vid-1 end-->
                        <div class="abt-mk">
                            <div class="info-pr-sec">
                                <div class="vcp_inf cr">
                                    <div class="vc_hd">
                                        <img src="sources/avatar/user-img.png" alt="" id="transaction_user_avatar">
                                    </div>
                                    <div class="vc_info pr">
                                        <h4 id="transaction_user"></h4>
                                        <span id="transaction_time"></span>
                                    </div>
                                </div><!--vcp_inf end-->
                                <ul class="chan_cantrz">
                                    <li>
                                        <a href="#" title="" class="bg-warning">举报</a>
                                    </li>
                                    <li>
                                        <a href="#" title="" class="subscribe">添加评论</a>
                                    </li>
                                </ul><!--chan_cantrz end-->
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div><!--abt-mk end-->
                        <div class="amazon">
                            <div class="abt-amz">
                                <div class="amz-hd">
                                    <h2 id="transaction_content"></h2>
                                </div><!--amz-hd end-->
                                <div class="clearfix"></div>
                            </div><!--abt-amz end-->
                        </div><!--amazon end-->
                        <div class="cmt-bx">
                            <ul class="cmt-pr">
                                <li><span id="transaction_comments_count"></span> 评论</li>
                                <li>
                                    <span><i class="icon-sort_by"></i><a href="#" title="">排序</a></span>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                            <div class="vcp_inf pc">
                                <div class="clearfix"></div>
                            </div><!--cmt-bx end-->
                            <ul class="cmn-lst" id="comments">

                            </ul><!--comment list end-->
                        </div>
                    </div><!--mn-vid-sc end--->
                </div><!---col-lg-9 end-->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="vidz-prt">
                            <h2 class="sm-vidz">其他内容</h2>
                            <div class="clearfix"></div>
                        </div><!--vidz-prt end-->
                        <div class="videoo-list-ab" id="side_transactions">

                        </div><!--videoo-list-ab end-->
                    </div><!--side-bar end-->
                </div>
            </div>
        </div>
    </section><!--mn-sec end-->


    <?php showFooter($conn); ?>
</div><!--wrapper end-->


<?php showDefaultScript(); ?>
</body>
<script>
    $.ajax({
        url: "api/standard_api.php",
        method: "post",
        dataType: "json",
        data: {
            "function": "transaction_page",
            "TID":<?php echo $_GET['TID'] ?>
        },
        success: function (result) {
            if (result.data.transaction.isHas === "否") {
                window.location = "error_pages/404ErrorPage.html"
            }
            document.getElementById("transaction_title").innerText = result.data.transaction.Title;
            if (result.data.transaction.UID !== null)
                document.getElementById("transaction_user").innerHTML = '<a href="center.php?UID=' + result.data.transaction.UID + '">' + result.data.transaction.UserName + '</a>';
            else
                document.getElementById("transaction_user").innerHTML = result.data.transaction.UserName;
            document.getElementById("transaction_content").innerText = result.data.transaction.Content;
            document.getElementById("transaction_likes").innerText = result.data.transaction.Likes;
            if (result.data.transaction.Picture!=="") {
                var picLink = result.data.transaction.Picture;
                $("#transaction_content").after("<br><br><img src='"+picLink+"' title='点击查看大图' alt='' style='max-width: 750px;max-height: 100%' '>")
                console.log(picLink);
            }
            document.getElementById("transaction_comments_count").innerText = result.data.comments.comments_count;
            if (result.data.transaction.ContactType!=="不添加")
                document.getElementById("transaction_time").innerText = result.data.transaction.SubmitTime+"\n"+"联系方式："+result.data.transaction.ContactType+" "+result.data.transaction.Contact;
            else
                document.getElementById("transaction_time").innerText = result.data.transaction.SubmitTime+"\n"+"未添加联系方式";
            document.getElementById("transaction_user_avatar").setAttribute("src", result.data.transaction.Avatar)
            for (i = 0; i < result.data.transactions.transaction_count; i++) {
                addtransaction(
                    result.data.transactions[i].TID,
                    result.data.transactions[i].Title,
                    result.data.transactions[i].UserName,
                    result.data.transactions[i].UID,
                    result.data.transactions[i].Likes,
                    result.data.transactions[i].SubmitTime);
            }
            for (i = 0;i<result.data.comments.comments_count;i++){
                addComments(
                    result.data.comments[i].Avatar,
                    result.data.comments[i].UID,
                    result.data.comments[i].UserName,
                    result.data.comments[i].SubmitTime,
                    result.data.comments[i].Content,
                    result.data.comments[i].Likes
                );
            }
        }
    })

    function addtransaction(link, title, username, userlink, likes, time) {
        var div = document.getElementById("side_transactions");
        div.innerHTML += `
        <div class="videoo">
            <div class="video_info">
                <h3><a href="transaction.php?TID=${link}" title="">${title}</a></h3>
                <h4><a href="center.php?UID=${userlink}" title="">${username}</a></h4>
                <span>${likes}赞<small class="posted_dt">${time}</small></span>
            </div>
        </div>`
    }

    function addComments(avatar,UID,username,time,content,likes) {
        var div = document.getElementById("comments");
        div.innerHTML += `
<li>
    <div class="vcp_inf">
        <div class="vc_hd">
            <img src="${avatar}" alt="">
        </div>
        <div class="coments">
            <h2><a href="center.php?UID=${UID}">${username} </a><small class="posted_dt">${time}</small></h2>
            <p>${content}</p>
            <ul class="cmn-i">
                <li>
                    <a onclick="" title="">
                        <i class="icon-thumbs_up"></i>
                    </a>
                    <span>${likes}</span>
                </li>
            </ul>
        </div>
    </div>
</li>
        `}


</script>
</html>