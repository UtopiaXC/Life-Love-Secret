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
    <title><?php echo $Title ?> - 新增留言</title>
    <?php showDefaultHead(); ?>

</head>
<body>
<div class="wrapper hp_1">
    <?php showHeader($conn); ?>
    <?php showMenu($conn); ?>

    <section class="vid-title-sec">
        <div class="container">
            <form method="post" onsubmit="return false;">
                <div class="vid-title">
                    <h2 class="title-hd">留言标题 <span style="color: red">*</span></h2>
                    <div class="form_field">
                        <label for="title" style="display: none"></label>
                        <input id="title" type="text" placeholder="添加一个标题，长度小于30字">
                    </div>
                </div><!--vid-title-->
                <div class="abt-vidz-pr">
                    <h2 class="title-hd">留言内容 <span style="color: red">*</span></h2>
                    <div class="form_field">
                        <label for="content" style="display: none"></label>
                        <textarea id="content" placeholder="内容"></textarea>
                    </div>
                </div><!--abt-vidz-->
                <div class="cls-vidz">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                            <div class="option">
                                <h2 class="title-hd">是否匿名 <span style="color: red">*</span></h2>
                                <div class="form_field">
                                    <label for="anonymous" style="display: none"></label>
                                    <select id="anonymous">
                                        <option value="global">采用全局（隐匿模式）设置</option>
                                        <option value="false">不采用匿名</option>
                                        <option value="true">采用匿名</option>
                                    </select>
                                </div>
                            </div><!--option end-->
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                            <div class="option">
                                <h2 class="title-hd">选择分区 <span style="color: red">*</span></h2>
                                <div class="form_field">
                                    <label for="type" style="display: none"></label>
                                    <select id="type">
                                        <option value="confession" <?php if ($_GET['type'] == "confession") echo "selected=selected" ?>>
                                            表白
                                        </option>
                                        <option value=secret"" <?php if ($_GET['type'] == "secret") echo "selected=selected" ?>>
                                            树洞
                                        </option>
                                        <option value="found" <?php if ($_GET['type'] == "found") echo "selected=selected" ?>>
                                            失物招领
                                        </option>
                                        <option value="transaction" <?php if ($_GET['type'] == "transaction") echo "selected=selected" ?>>
                                            校内交易
                                        </option>
                                    </select>
                                </div>
                            </div><!--option end-->
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                            <div class="option">
                                <h2 class="title-hd">联系方式 <span style="color: red">*</span></h2>
                                <div class="form_field">
                                    <label for="contact" style="display: none"></label>
                                    <select id="contact">
                                        <option value="不添加">不添加</option>
                                        <option value="电话">电话</option>
                                        <option value="QQ">QQ</option>
                                        <option value="微信">微信</option>
                                        <option value="邮箱">邮箱</option>
                                        <option value="个人网站">个人网站</option>
                                        <option value="GitHub">GitHub</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Telegram">Telegram</option>
                                        <option value="Instagram">Instagram</option>
                                    </select>
                                </div>
                            </div><!--option end-->
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                            <div class="option">
                                <h2 class="title-hd">具体联系方式（可选）</h2>
                                <div class="form_field pr">
                                    <label for="contact-details" style="display: none"></label>
                                    <input type="text" id="contact-details" placeholder="请输入联系方式">
                                </div>
                            </div><!--option end-->
                        </div>
                    </div>
                </div><!--cls-vidz end-->
                <div class="abt-tags">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-8 col-12">
                            <h2 class="title-hd">添加图片链接（仅支持一张，多图请拼接。建议使用外链。）</h2>
                            <div class="form_field pr">
                                <label for="pic-link" style="display: none"></label>
                                <input type="text" id="pic-link" placeholder="请输入一个图片链接">
                            </div>
                        </div>
                        <button id="upload" class="btn-default" type="button">上传</button>
                    </div>
                </div><!--abt-tags--->
                <div class="category">
                    <div class="category-typ">
                        <div class="clearfix"></div>
                        <div class="btn-sbmit">
                            <button type="button" onclick="add_new();">发布</button>
                        </div><!--btn-sbmit end-->
                    </div><!--category-typ-->
                </div><!--Category-->
            </form>
        </div>
    </section><!--vid-title-sec-->
    <br><br>
    <?php showFooter($conn); ?>
</div><!--wrapper end-->
<?php showDefaultScript(); ?>
<script>
    var uploadButton = $('#upload');
    uploadButton.after('<input type="file" id="load_xls" accept="image/jpeg,image/png" name="file" style="display:none" onchange ="uploadFile()">');
    uploadButton.click(function () {
        document.getElementById("load_xls").click();

    });

    function uploadFile() {
        var picture = new FormData();
        var filePic = $('#load_xls')[0].files[0];
        picture.append('file', filePic);
        picture.append('function', 'uploadPic');
        if (!/\.(jpg|jpeg|png|JPG|PNG)$/.test(filePic.name)) {
            swal("警告", "您选择的图片格式错误！必须是JPG或PNG图片", "warning");
            return false;
        }
        if (filePic.size > 10 * 1024 * 1024) {
            swal("警告", "您选择的图片过大！图片大小不能超过10MB！", "warning");
            return false;
        }

        swal({
                title: "确认您要上传的图片",
                text: "图片名：" + filePic.name + "\n大小：" + (filePic.size / 1024 / 1024).toFixed(2) + "KB\n提醒：您的图片上传后将被重命名",
                type: "info",
                confirmButtonText: "上传",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function () {
                setTimeout(function () {
                    $.ajax({
                        url: "api/standard_api.php",
                        type: "POST",
                        data: picture,
                        contentType: false,
                        processData: false,
                        success: function (result) {
                            if (result.data.isUploaded === "true")
                                swal({
                                    title: "上传成功",
                                    type: "success",
                                }, function () {
                                   var link= $("#pic-link");
                                   link.val(result.data.location);
                                   link.attr("disabled","disabled");
                                });
                            else
                                swal("上传失败", result.data.error, "error");
                        },
                        error: function () {
                            swal("抱歉！", "服务器异常", "error");
                        }
                    });
                });
            });
    }


    function add_new() {
        var title = $("#title").val();
        var content = $("#content").val();
        var anonymous = $("#anonymous").val();
        var type = $("#type").val();
        var contact = $("#contact").val();
        var contact_details = $("#contact-details").val();
        var pic_link = $("#pic-link").val();


        if (title === "" || content === "") {
            swal("警告", "您有带星的必填项未填写", "warning");
            return false;
        }

        swal({
                title: "确认信息",
                text: "标题：" + title + "\n内容：" + content.substring(0, 10) + "...",
                type: "info",
                confirmButtonText: "发布",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function () {
                setTimeout(function () {
                    $.ajax({
                        url: "api/standard_api.php",
                        dataType: "json",
                        type: "POST",
                        data: {
                            "function":"release_new",
                            "title":title,
                            "content":content,
                            "anonymous":anonymous,
                            "type":type,
                            "contact":contact,
                            "contact_details":contact_details,
                            "picture":pic_link
                        },
                        success: function (result) {
                            if (result.data.isSucceed==="成功"){
                                swal({
                                    title: "成功",
                                    text:"内容发布成功",
                                    type: "success",
                                },function (){window.location=result.data.location});
                            }else{
                                swal("抱歉！", "表单错误", "error");
                            }
                        },
                        error: function () {
                            swal("抱歉！", "服务器异常", "error");
                        }
                    });
                });
            });


    }


</script>
</body>
</html>