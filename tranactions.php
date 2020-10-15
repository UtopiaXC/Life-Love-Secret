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

    <section class="videso_section">
        <div class="info-pr-sec">
            <div class="container">
                <div class="vcp_inf cr">
                    <h4>校内交易 <span class="verify_ic"></i></span></h4>
                    <span>1 条留言</span>
                </div><!--vcp_inf end-->
                <ul class="chan_cantrz">
                    <li>
                        <a href="#" title="" class="subscribe">添加新交易</a>
                    </li>
                </ul><!--chan_cantrz end-->
                <div class="search_form">
                    <form>
                        <label for="page-search" style="display: none"></label>
                        <input id="page-search" type="text" name="search" placeholder="搜索校内交易">
                        <button type="submit">
                            <i class="icon-search"></i>
                        </button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div><!--info-pr-sec end-->
        <div class="tab-content p-0" id="myTabContent">
            <div class="tab-pane fade show active" id="vvideo_tabz" role="tabpanel" aria-labelledby="videos_taab">
                <div class="videso_tb_details">
                    <div class="container">
                        <div class="vidz_sec">
                            <a href="#" title=""><i class="icon-sort_by"></i>Sort By</a>
                            <br><br>
                            <div class="clearfix"></div>
                            <div class="vidz_list">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">
                                        <div class="videoo">
                                            <div class="vid_thumbainl">
                                                <a href="#" title="">
                                                    <span class="vid-time">10:21</span>
                                                    <span class="watch_later">
														<i class="icon-watch_later_fill"></i>
													</span>
                                                </a>
                                            </div><!--vid_thumbnail end-->
                                            <div class="video_info">
                                                <h3><a href="#" title="">测试留言</a></h3>
                                                <h4><a href="#" title="">UtopiaXC</a> </i></span></h4>
                                                <span>1 点赞<small class="posted_dt">2020-10-1</small></span>
                                            </div>
                                        </div><!--videoo end-->
                                    </div>
                                </div>
                            </div><!--vidz_list end-->
                        </div><!--vidz_videos end-->
                    </div>
                </div><!--videso_tb_details end-->
            </div>
        </div>
    </section><!--Featured Videos end-->

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