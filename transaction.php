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
    <title><?php echo $Title?> - 校内交易</title>
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
                                <h3>测试标题</h3>
                                <div class="info-pr">
                                    <ul class="pr_links">
                                        <li>
                                            <button data-toggle="tooltip" data-placement="top" title="I like this">
                                                <i class="icon-thumbs_up_fill"></i>
                                            </button>
                                            <span> 1</span>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div><!--info-pr end-->
                            </div><!--vid-info end-->
                        </div><!--vid-1 end-->
                        <div class="abt-mk">
                            <div class="info-pr-sec">
                                <div class="vcp_inf cr">
                                    <div class="vc_info pr">
                                        <h4><a href="#" title="">UtopiaXC</a></h4>
                                        <span>2020.10.2</span>
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
                                    <h2>这是一条测试内容</h2>
                                </div><!--amz-hd end-->
                                <div class="clearfix"></div>
                            </div><!--abt-amz end-->
                        </div><!--amazon end-->
                        <div class="cmt-bx">
                            <ul class="cmt-pr">
                                <li><span>3</span> 评论</li>
                                <li>
                                    <span><i class="icon-sort_by"></i><a href="#" title="">排序</a></span>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                            <div class="vcp_inf pc">
                                <div class="clearfix"></div>
                            </div><!--cmt-bx end-->
                            <ul class="cmn-lst">
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="/sources/avatar/user-img.jpg" alt="">
                                        </div>
                                        <div class="coments">
                                            <div class="pinned-comment">
                                                <span><i class="icon-pinned"></i>置顶</span>
                                            </div>
                                            <h2>UtopiaXC <small class="posted_dt">2020-10-2 15:23:54</small></h2>
                                            <p>这是一条测试评论</p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>3</span>
                                                </li>
                                            </ul>
                                        </div><!--coments end-->
                                    </div><!--vcp_inf end-->
                                </li>
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
                        <div class="videoo-list-ab">
                            <div class="videoo">
                                <div class="video_info">
                                    <h3><a href="#" title="">测试标题</a></h3>
                                    <h4><a href="#" title="">UtopiaXC</a></h4>
                                    <span>1 推荐<small class="posted_dt">2020-10-2</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="video_info">
                                    <h3><a href="#" title="">测试标题</a></h3>
                                    <h4><a href="#" title="">UtopiaXC</a></h4>
                                    <span>1 推荐<small class="posted_dt">2020-10-2</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="video_info">
                                    <h3><a href="#" title="">测试标题</a></h3>
                                    <h4><a href="#" title="">UtopiaXC</a></h4>
                                    <span>1 推荐<small class="posted_dt">2020-10-2</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="video_info">
                                    <h3><a href="#" title="">测试标题</a></h3>
                                    <h4><a href="#" title="">UtopiaXC</a></h4>
                                    <span>1 推荐<small class="posted_dt">2020-10-2</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="video_info">
                                    <h3><a href="#" title="">测试标题</a></h3>
                                    <h4><a href="#" title="">UtopiaXC</a></h4>
                                    <span>1 推荐<small class="posted_dt">2020-10-2</small></span>
                                </div>
                            </div><!--videoo end-->
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
</html>