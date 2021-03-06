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
    <title><?php echo $Title?> - 树洞</title>
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
            "function":"secrets_page",
            "page":page++
        },
        success:function (result){
            $("#secrets_count").text(result.data.secrets_count+" 条留言");
            for (i=0;i<result.data.secrets_count;i++){
                addSecrets(result.data[i].Title,
                    result.data[i].SID,
                    result.data[i].UserName,
                    result.data[i].UID,
                    result.data[i].Likes,
                    result.data[i].SubmitTime)
            }
        }
    })
    function addSecrets(Title,SID,username,UID,likes,time){
        var div=document.getElementById("confessions");
        div.innerHTML+='<div class="col-lg-3 col-md-3 col-sm-6 col-6 full_wdth">' +
            '               <div class="videoo">' +
            '                   <div class="video_info">' +
            '                       <h3><a href="secret.php?SID='+SID+'" title="">'+Title+'</a></h3>' +
            '                       <h4><a href="center.php?UID='+UID+'" title="">'+username+'</a> </i></span></h4>' +
            '                       <span>'+likes+' 点赞<small class="posted_dt">'+time+'</small></span>' +
            '                   </div>\n' +
            '               </div><!--videoo end-->' +
            '           </div>';
    }
</script>
</html>