<?php
require_once "email_api.php";
require_once "Response.php";
require_once "sql_api.php";
$conn=getConn();

//API返回格式
header('Content-Type:text/json;charset=utf-8');

//以下为测试代码块
//创建数组
//$arr = [
//    "EmailStatue"=>"Succeed"
//];
//
//Response::json(200, "API successfully called", $arr);

if ($_POST['function']=="register"){
    $stmt=$conn->prepare("SELECT UID FROM user WHERE UserName=?");
    $stmt->bind_param("s",$_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows()!=0){
        $stmt->fetch();
        $arr=["isSucceed"=>"用户名已被注册！"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $stmt=$conn->prepare("SELECT UID FROM user WHERE Email=?");
    $stmt->bind_param("s",$_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($isHas);
    if ($stmt->num_rows()!=0){
        $stmt->fetch();
        $arr=["isSucceed"=>"邮箱已被注册"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $result = $conn->query("SELECT * FROM web_message");
    $Title = "";
    $useEmail="";
    while ($row = $result->fetch_assoc()) {
        if ($row['Title']=="使用邮箱"){
            $useEmail=$row['Content'];
        }
    }
    if ($useEmail=="否"){
        $stmt = $conn->prepare("INSERT INTO user(UserName, Email, Password,isVerified, isHiden, Theme)VALUES(?,?,?,'是','否','默认')");
        $stmt->bind_param("ssss", $_POST['username'], $_POST['email'], md5("#*#*4636" . md5($_POST['password']) . "114514*#*#"));
        $stmt->execute();
        $arr = ["isSucceed" => "成功"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }else {
        $result = $conn->query("SELECT * FROM web_message");
        $Host = "";
        $Secure = "";
        $Port = "";
        $ShowName = "";
        $sender = "";
        $senderPassword = "";
        $local = "";
        $Title = "";
        while ($row = $result->fetch_assoc()) {
            if ($row['Title'] == "发件信箱") {
                $sender = $row['Content'];
            }
            if ($row['Title'] == "发件服务器") {
                $Host = $row['Content'];
            }
            if ($row['Title'] == "发件端口") {
                $Port = $row['Content'];
            }
            if ($row['Title'] == "安全协议") {
                $Secure = $row['Content'];
            }
            if ($row['Title'] == "发件人名") {
                $ShowName = $row['Content'];
            }
            if ($row['Title'] == "发件密码") {
                $senderPassword = $row['Content'];
            }
            if ($row['Title'] == "域名") {
                $local = $row['Content'];
            }
            if ($row['Title'] == "网站标题") {
                $Title = $row['Content'];
            }
        }
        if ($Secure == "不使用")
            $Secure = false;
        $VerifiledCode = md5($_POST['username'] . microtime(true));
        sendEmail($Host, $Secure, $Port, $ShowName, $sender, $senderPassword, $_POST['email'], $Title . "注册验证码", verifiedEmail($Title, $local . "api/register_api.php?code=" . $VerifiledCode));
        $stmt = $conn->prepare("INSERT INTO user(UserName, Email, Password,VerifiedCode,Timeout,isVerified, isHiden, Theme)VALUES(?,?,?,?," . (time() + 600) . ",'否','否','默认')");
        $stmt->bind_param("ssss", $_POST['username'], $_POST['email'], md5("#*#*4636" . md5($_POST['password']) . "114514*#*#"), $VerifiledCode);
        $stmt->execute();
        $arr = ["isSucceed" => "成功"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
}
if ($_POST['function']=="resendRegisterEmail"){
    $result = $conn->query("SELECT * FROM web_message");
    $Host = "";
    $Secure="";
    $Port="";
    $ShowName="";
    $sender="";
    $senderPassword="";
    $local="";
    $Title="";
    while ($row = $result->fetch_assoc()) {
        if ($row['Title'] == "发件信箱") {
            $sender = $row['Content'];
        }
        if ($row['Title'] == "发件服务器") {
            $Host = $row['Content'];
        }
        if ($row['Title'] == "发件端口") {
            $Port = $row['Content'];
        }
        if ($row['Title'] == "安全协议") {
            $Secure = $row['Content'];
        }
        if ($row['Title'] == "发件人名") {
            $ShowName = $row['Content'];
        }
        if ($row['Title'] == "发件密码") {
            $senderPassword = $row['Content'];
        }
        if ($row['Title'] == "域名") {
            $local = $row['Content'];
        }
        if ($row['Title'] == "网站标题") {
            $Title = $row['Content'];
        }
    }
    if ($Secure=="不使用")
        $Secure=false;
    $VerifiledCode=md5($_POST['username'].microtime(true));
    sendEmail($Host,$Secure,$Port,$ShowName,$sender,$senderPassword,$_POST['email'],$Title."注册验证码",verifiedEmail($Title,$local."api/register_api.php?code=".$VerifiledCode));
    $conn->query("UPDATE user SET VerifiedCode='$VerifiledCode',Timeout='".(time()+600)."' WHERE Email='".$_POST['email']."'");
    $arr=["isSucceed"=>"成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}