<?php
require_once "api/standard_display_api.php";
require_once "api/sql_api.php";
$conn=getConn();
if ($conn->connect_error){
    header('Location: DatabaseErrorPage.html');
    exit;
}


?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>Life&Love&Secret - 主页</title>
    <?php showDefaultHead(); ?>
</head>
<body>
<div class="wrapper hp_1">
    <?php showHeader(); ?>
    <?php showMenu(); ?>

    <section class="banner-section">
        <div class="container">
            <div class="banner-text">
                <h2>欢迎来到Life&Love&Secret</h2>
                <a href="#" title="">查看置顶公告</a>
            </div><!--banner-text end-->
        </div>
    </section><!--banner-section end-->

    <section class="vds-main">
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    <h3>表白墙</h3>
                    <a href="#" title="" class="view-btn">查看全部</a>
                    <div class="vidz_list">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    <h3>树洞</h3>
                    <a href="#" title="" class="view-btn">查看全部</a>
                    <div class="vidz_list">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    <h3>失物招领</h3>
                    <a href="#" title="" class="view-btn">查看全部</a>
                    <div class="vidz_list">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    <h3>校内交易</h3>
                    <a href="#" title="" class="view-btn">查看全部</a>
                    <div class="vidz_list">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="video_info">
                                        <h3><a href="参考/single_video_page.html" title="">测试标题</a></h3>
                                        <h4><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h4>
                                        <span>100赞<small class="posted_dt">2020-10-2</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
        <div class="vidz-row pop_channels">
            <div class="container">
                <div class="vidz_sec">
                    <h3>活跃用户</h3>
                    <div class="vidz_list">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="vid_thumbainl">
                                        <a href="参考/Single_Channel_Home.html" title="">
                                            <img src="images/resources/user-img.jpg" alt="">
                                        </a>
                                    </div><!--vid_thumbnail end-->
                                    <div class="video_info">
                                        <h3><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h3>
                                        <span>100关注</span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="vid_thumbainl">
                                        <a href="参考/Single_Channel_Home.html" title="">
                                            <img src="images/resources/user-img.jpg" alt="">
                                        </a>
                                    </div><!--vid_thumbnail end-->
                                    <div class="video_info">
                                        <h3><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h3>
                                        <span>100关注</span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="vid_thumbainl">
                                        <a href="参考/Single_Channel_Home.html" title="">
                                            <img src="images/resources/user-img.jpg" alt="">
                                        </a>
                                    </div><!--vid_thumbnail end-->
                                    <div class="video_info">
                                        <h3><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h3>
                                        <span>100关注</span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="vid_thumbainl">
                                        <a href="参考/Single_Channel_Home.html" title="">
                                            <img src="images/resources/user-img.jpg" alt="">
                                        </a>
                                    </div><!--vid_thumbnail end-->
                                    <div class="video_info">
                                        <h3><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h3>
                                        <span>100关注</span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="vid_thumbainl">
                                        <a href="参考/Single_Channel_Home.html" title="">
                                            <img src="images/resources/user-img.jpg" alt="">
                                        </a>
                                    </div><!--vid_thumbnail end-->
                                    <div class="video_info">
                                        <h3><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h3>
                                        <span>100关注</span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="vid_thumbainl">
                                        <a href="参考/Single_Channel_Home.html" title="">
                                            <img src="images/resources/user-img.jpg" alt="">
                                        </a>
                                    </div><!--vid_thumbnail end-->
                                    <div class="video_info">
                                        <h3><a href="参考/Single_Channel_Home.html" title="">测试用户</a></h3>
                                        <span>100关注</span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
    </section><!--vds-main end-->

    <?php showFooter();?>
</div><!--wrapper end-->


<?php showDefaultScript();?>
</body>
</html>