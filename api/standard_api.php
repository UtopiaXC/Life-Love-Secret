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
        $stmt = $conn->prepare("INSERT INTO user(UserName, Email, Password,isVerified, isHiden, Theme,UserGroup)VALUES(?,?,?,'是','否','默认','user')");
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
if ($_POST['function']=="login"){
    $stmt=$conn->prepare("SELECT Password,isVerified FROM user WHERE UserName=? OR Email=?");
    $stmt->bind_param("ss",$_POST['username'],$_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($password,$isVerifild);
    if ($stmt->num_rows()!=1){
        $arr=["isSucceed"=>"账户不存在"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $stmt->fetch();
    if (md5("#*#*4636".md5($_POST['password'])."114514*#*#")!=$password){
        $arr=["isSucceed"=>"密码错误"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    if ($isVerifild=="否"){
        $arr=["isSucceed"=>"账户未激活"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $TokenID=md5(md5($_POST['username']).microtime(true));
    $Token=md5(md5($_POST['password']).microtime(true));
    setcookie("TokenID",$TokenID,time()+10*365*24*60*60,"/");
    setcookie("Token",$Token,time()+10*365*24*60*60,"/");
    $conn->query("UPDATE user SET TokenID='$TokenID',Token='$Token' WHERE UserName='".$_POST['username']."' OR Email='".$_POST['username']."'");
    $arr=["isSucceed"=>"成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function']=="logout"){
    //echo "UPDATE user SET TokenID=null,Token=null WHERE TokenID='".$_COOKIE['TokenID']."'";
    $conn->query("UPDATE user SET TokenID=null,Token=null WHERE TokenID='".$_COOKIE['TokenID']."'");
    $arr=["isSucceed"=>"成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function']=="find_password"){
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
    $VerifiledCode=md5($_POST['email'].microtime(true));
    sendEmail($Host,$Secure,$Port,$ShowName,$sender,$senderPassword,$_POST['email'],$Title."密码找回验证码",findPasswordEmail($Title,$local."api/find_password_api.php?code=".$VerifiledCode));
    $conn->query("UPDATE user SET VerifiedCode='$VerifiledCode',Timeout='".(time()+600)."' WHERE Email='".$_POST['email']."'");
    $arr=["isSucceed"=>"成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function']=="submit_find_password"){
    $stmt = $conn->prepare("UPDATE user SET Password=? WHERE VerifiedCode=?");
    $password = md5("#*#*4636" . md5($_POST['password']) . "114514*#*#");
    $stmt->bind_param("ss", $password, $_POST['code']);
    $stmt->execute();
    $conn->query("UPDATE user SET VerifiedCode=null,TokenID=null,Token=null WHERE VerifiedCode='".$_POST['code']."'");
    $arr = ["isSucceed" => "成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_GET['function']=="main_page"){
    $arr=[];

    $confessions=[];
    $result=$conn->query("SELECT * FROM confession ORDER BY LID DESC LIMIT 4");
    $confession_count=$result->num_rows;
    $confessions+=["confession_count" => $confession_count];
    $i=1;
    while($row=$result->fetch_assoc()){
        $confessions+=["c".$i++=>$row];
    }

    $secrets=[];
    $result=$conn->query("SELECT * FROM secret ORDER BY LID DESC LIMIT 4");
    $secret_count=$result->num_rows;
    $secrets+=["secret_count" => $secret_count];
    $i=1;
    while($row=$result->fetch_assoc()){
        $secrets+=["s".$i++=>$row];
    }

    $arr=["confession"=>$confessions]+["secret"=>$secrets];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}