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

    <section class="videso_section">
        <div class="info-pr-sec">
            <div class="container">
                <div class="vcp_inf cr">
                    <h4>表白墙 <span class="verify_ic"></i></span></h4>
                    <span id="transactions_count">1 条留言</span>
                </div><!--vcp_inf end-->
                <ul class="chan_cantrz">
                    <li>
                        <a href="add_new.php?type=transaction" title="" class="subscribe">添加新留言</a>
                    </li>
                </ul><!--chan_cantrz end-->
                <div class="search_form">
                    <form>
                        <label for="page-search" style="display: none"></label>
                        <input id="page-search" type="text" name="search" placeholder="搜索树洞">
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
                                <div class="row" id="confessions">
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
    var page=1;
    $.ajax({
        url:"api/standard_api.php",
        method:"post",
        dataType:"json",
        data:{
            "function":"transactions_page",
            "page":page++
        },
        success:function (result){
            $("#transactions_count").text(result.data.transactions_count+" 条留言");
            for (i=0;i<result.data.transactions_count;i++){
                addtransactions(result.data[i].Title,
                    result.data[i].TID,
                    result.data[i].UserName,
                    result.data[i].UID,
                    result.data[i].Likes,
                    result.data[i].SubmitTime)
            }
        }
    })
    function addtransactions(Title,TID,username,UID,likes,time){
        var div=document.getElementById("confessions");
        div.innerHTML+='<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">' +
            '               <div class="videoo">' +
            '                   <div class="video_info">' +
            '                       <h3><a href="transaction.php?TID='+TID+'" title="">'+Title+'</a></h3>' +
            '                       <h4><a href="center.php?UID='+UID+'" title="">'+username+'</a> </i></span></h4>' +
            '                       <span>'+likes+' 点赞<small class="posted_dt">'+time+'</small></span>' +
            '                   </div>\n' +
            '               </div><!--videoo end-->' +
            '           </div>';
    }
</script>
</html>