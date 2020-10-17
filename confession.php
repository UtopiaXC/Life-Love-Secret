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
    <title><?php echo $Title?> - 主页</title>
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
                                <div class="vc_hd">
                                    <img src="../images/resources/th1.png" alt="">
                                </div>
                                <form>
                                    <input type="text" placeholder="Add a public comment">
                                    <button type="submit">Comment</button>
                                </form>
                                <div class="clearfix"></div>
                                <div class="rt-cmt">
                                    <a href="#" title="">
                                        <i class="icon-cancel"></i>
                                    </a>
                                    <div class="clearfix"></div>
                                </div><!--vcp_inf end-->
                            </div><!--cmt-bx end-->
                            <ul class="cmn-lst">
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="../images/resources/th2.png" alt="">
                                        </div>
                                        <div class="coments">
                                            <div class="pinned-comment">
                                                <span><i class="icon-pinned"></i>Pinned by ScereBro</span>
                                            </div>
                                            <h2>ScereBro <small class="posted_dt"> . 18 hours ago</small></h2>
                                            <p>Where does Thor: Ragnarok rank amongst the other Thor movies? Amongst the rest of the MCU? Let us know in the comments below and tell us which other movies you'd like to see us make Honest.</p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>680</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_down"></i>
                                                    </a>
                                                    <span>21</span>
                                                </li>
                                            </ul>
                                            <a href="#" title="">View all 164 replies</a>
                                        </div><!--coments end-->
                                    </div><!--vcp_inf end-->
                                </li>
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="../images/resources/th3.png" alt="">
                                        </div>
                                        <div class="coments">
                                            <h2>Doge <small class="posted_dt"> . 2 hours ago</small></h2>
                                            <p>Depressive Alcoholics are my favorite superheroes </p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>61</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_down"></i>
                                                    </a>
                                                    <span>3</span>
                                                </li>
                                            </ul>
                                            <a href="#" title="">View all 26 replies</a>
                                        </div><!--coments end-->
                                    </div><!--vcp_inf end-->
                                </li>
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="../images/resources/th4.png" alt="">
                                        </div>
                                        <div class="coments">
                                            <h2>Juan Lacanaria <small class="posted_dt"> . 12 hours ago</small></h2>
                                            <p>Can you please say "winner winner , chicken dinner" </p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>22</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_down"></i>
                                                    </a>
                                                    <span></span>
                                                </li>
                                            </ul>
                                            <a href="#" title="">View all 9 replies</a>
                                        </div><!--coments end-->
                                    </div><!--vcp_inf end-->
                                </li>
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="../images/resources/th5.png" alt="">
                                        </div>
                                        <div class="coments">
                                            <h2>Comander Lucky <small class="posted_dt"> . 2 weeks ago</small></h2>
                                            <p>It looked like electro shuffle was most synced</p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>37</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_down"></i>
                                                    </a>
                                                    <span>3</span>
                                                </li>
                                            </ul>
                                            <a href="#" title="">View all 12 replies</a>
                                        </div><!--coments end-->
                                    </div><!--vcp_inf end-->
                                </li>
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="../images/resources/th1.png" alt="">
                                        </div>
                                        <div class="coments">
                                            <h2>Menji <small class="posted_dt"> . 1 week ago</small></h2>
                                            <p>The floss, fresh, flapper, ride the pony were all in sync if you ask me plus if they used the original music they would be copyrighted. Plus the original music made it worst for these dances. </p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>147</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_down"></i>
                                                    </a>
                                                    <span>8</span>
                                                </li>
                                            </ul>
                                            <a href="#" title="">View all 7 replies</a>
                                        </div><!--coments end-->
                                    </div><!--vcp_inf end-->
                                </li>
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="../images/resources/th3.png" alt="">
                                        </div>
                                        <div class="coments">
                                            <h2>Storax Storm <small class="posted_dt"> . 11 hours ago</small></h2>
                                            <p>Well Epic Games would have gotten Copyrighted if they used the original music but yea I see you</p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>71</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_down"></i>
                                                    </a>
                                                    <span>28</span>
                                                </li>
                                            </ul>
                                            <a href="#" title="">View all 21 replies</a>
                                        </div><!--coments end-->
                                    </div><!--vcp_inf end-->
                                </li>
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="../images/resources/th2.png" alt="">
                                        </div>
                                        <div class="coments">
                                            <h2>Nick Jacobs <small class="posted_dt"> . 6 hours ago</small></h2>
                                            <p>Electro shuffle best dance hands down </p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>42</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_down"></i>
                                                    </a>
                                                    <span></span>
                                                </li>
                                            </ul>
                                            <a href="#" title="">View all 32 replies</a>
                                        </div><!--coments end-->
                                    </div><!--vcp_inf end-->
                                </li>
                                <li>
                                    <div class="vcp_inf">
                                        <div class="vc_hd">
                                            <img src="../images/resources/th4.png" alt="">
                                        </div>
                                        <div class="coments">
                                            <h2>Jumpman30  <small class="posted_dt"> . 2 hours ago</small></h2>
                                            <p>bruh okay the original fresh music is the best hands down, it looks classy. the music they put on the fresh in fort nite  makes it worse </p>
                                            <ul class="cmn-i">
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_up"></i>
                                                    </a>
                                                    <span>48</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">
                                                        <i class="icon-thumbs_down"></i>
                                                    </a>
                                                    <span>2</span>
                                                </li>
                                            </ul>
                                            <a href="#" title="">View all 3 replies</a>
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
                            <h2 class="sm-vidz">Similar Videos</h2>
                            <h3 class="aut-vid">
                                <span>Autoplay </span>
                                <label class="switch">
                                    <input type="checkbox">
                                    <b class="slider round"></b>
                                </label>
                            </h3>
                            <div class="clearfix"></div>
                        </div><!--vidz-prt end-->
                        <div class="videoo-list-ab">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="single_video_page.html" title="">
                                        <img src="../images/resources/vide1.png" alt="">
                                        <span class="vid-time">10:21</span>
                                        <span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="single_video_page.html" title="">
                                        <img src="../images/resources/vide2.png" alt="">
                                        <span class="vid-time">13:49</span>
                                        <span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="single_video_page.html" title="">
                                        <img src="../images/resources/vide3.png" alt="">
                                        <span class="vid-time">2:54</span>
                                        <span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="ad-rw">
                                <img src="../images/resources/ad-img.jpg" alt="">
                            </div>
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="single_video_page.html" title="">
                                        <img src="../images/resources/vide4.png" alt="">
                                        <span class="vid-time">5:25</span>
                                        <span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="single_video_page.html" title="">
                                        <img src="../images/resources/vide5.png" alt="">
                                        <span class="vid-time">4:01</span>
                                        <span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="single_video_page.html" title="">
                                        <img src="../images/resources/vide6.png" alt="">
                                        <span class="vid-time">6:20</span>
                                        <span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">A day in the life of a Google software engineer</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="single_video_page.html" title="">
                                        <img src="../images/resources/vide7.png" alt="">
                                        <span class="vid-time">8:16</span>
                                        <span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Avengers: Infinity War - Gym Workout</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
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
<script>
    function logout(){
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

    }


</script>
</html>