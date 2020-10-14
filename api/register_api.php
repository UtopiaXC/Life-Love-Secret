<?php
require_once "email_api.php";
require_once "Response.php";
require_once "sql_api.php";
$conn=getConn();
$stmt=$conn->prepare("SELECT Email,UserName,isVerified,Timeout FROM user WHERE VerifiedCode=?");
$stmt->bind_param("s",$_GET['code']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Email,$UserName,$isVerified,$Timeout);
$stmt->fetch();
?>
<html lang="zh-CN">
<head>
    <title>认证页面</title>
    <link href='../css/sweetalert.min.css' rel='stylesheet'>
    <script src='../js/sweetalert.js'></script>
    <script src='../js/jquery.min.js'></script>
</head>
<body>
</body>
<?php
if ($isVerified=="是"){
    echo '
<script>
swal({
title:"您的账户已经激活",
text:"您的账户已经是激活状态，无须再次激活",
type:"info",
confirmButtonText:"前往登录"
},function (){
    window.location="../login.php";
});
</script>

';
}
else if ($Timeout<time())
    echo '
    <script>
   swal({
                title: "抱歉！",
                text: "您的验证地址已失效！",
                type: "error",
                confirmButtonText: "重新发送邮件",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function () {
                setTimeout(function () {
                    $.ajax({
                        type: "POST",
                        url: "standard_api.php",
                        dataType: "json",
                        data: {
                            "function": "resendRegisterEmail",
                            "email": "'."$Email".'"
                        },
                        success: function (result) {
                            console.log(result)
                            if (result.data.isSucceed === "成功")
                                swal({
                                    title: "已重新发送",
                                    text: "您的激活地址已重新发送！请前往注册邮箱激活账户\n（如果未找到请查看邮箱垃圾桶）",
                                    type: "success",
                                },function (){window.location="login.php"});
                            else
                                swal("发送失败", result.data.isSucceed, "error");
                        },
                        error: function () {
                            swal("抱歉！", "服务器异常", "error");
                        }
                    });
                });
            })
    </script>
    ';
else{
    $conn->query("UPDATE user SET isVerified='是' WHERE VerifiedCode='".$_GET['code']."'");
    echo "
    <script>
swal({
title:'激活成功！',
text:'您的账户激活成功！',
type:'success',
confirmButtonText:'前往登录'
},function (){
    window.location='../login.php';
});
</script>
    
    ";
}
?>


</html>