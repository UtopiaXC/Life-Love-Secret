<?php
require_once "email_api.php";
require_once "Response.php";
require_once "sql_api.php";
$conn = getConn();
$stmt = $conn->prepare("SELECT Email,UserName,isVerified,Timeout FROM user WHERE VerifiedCode=?");
$stmt->bind_param("s", $_GET['code']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Email, $UserName, $isVerified, $Timeout);
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
if ($Timeout < time())
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
                            "function": "find_password",
                            "email": "' . "$Email" . '"
                        },
                        success: function (result) {
                            console.log(result)
                            if (result.data.isSucceed === "成功")
                                swal({
                                    title: "已重新发送",
                                    text: "您的重置地址已重新发送！请前往注册邮箱重置账户\n（如果未找到请查看邮箱垃圾桶）",
                                    type: "success",
                                },function (){window.location="../login.php"});
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
else {
    $conn->query("UPDATE user SET isVerified='是' WHERE VerifiedCode='" . $_GET['code'] . "'");
    echo "
    <script>
swal({
title:'重置账户密码',
text:'请输入新的密码！',
type:'input',
confirmButtonText:'重置',
inputPlaceholder: '输入待重置的密码',
inputType:'password',
closeOnConfirm: false,
},
function (inputValue){
    if (inputValue === false) return false;
    if (inputValue === '') {
        swal.showInputError('你需要输入新的密码！');
        return false
    }
    pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,26}$/;
    if (!pattern.test(inputValue)){
        swal.showInputError('您的密码不符合要求！您的密码需要在8～26位之间，且必须包含至少各一个大写字母、小写字母和数字');
        return false;
    }
    $.ajax({
        type: 'POST',
        url: 'standard_api.php',
        dataType: 'json',
        async: 'false',
        data: {
            'function': 'submit_find_password',
            'password': inputValue,
            'code': '" . $_GET['code'] . "'
        },
        success: function (result) {
            if (result.data.isSucceed === '成功') {
                swal({
                    title: '重置完成',
                    text: '您的密码已重置，请重新登录',
                    type: 'success',
                }, function () {
                    window.location = '../login.php'
                });
            } else {
                swal('错误！', '密码修改失败！', 'error');
            }
        },
        error: function () {
            swal('错误！', '密码修改失败！', 'error');

        }
    });
})
</script>
    
    ";
}
?>


</html>