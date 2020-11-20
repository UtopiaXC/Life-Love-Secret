<?php
require_once "email_api.php";
require_once "Response.php";
require_once "sql_api.php";
$conn = getConn();

//API返回格式
header('Content-Type:text/json;charset=utf-8');

//以下为测试代码块
//创建数组
//$arr = [
//    "EmailStatue"=>"Succeed"
//];
//
//Response::json(200, "API successfully called", $arr);

if ($_POST['function'] == "register") {
    $stmt = $conn->prepare("SELECT UID FROM user WHERE UserName=?");
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows() != 0) {
        $stmt->fetch();
        $arr = ["isSucceed" => "用户名已被注册！"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $stmt = $conn->prepare("SELECT UID FROM user WHERE Email=?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($isHas);
    if ($stmt->num_rows() != 0) {
        $stmt->fetch();
        $arr = ["isSucceed" => "邮箱已被注册"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $result = $conn->query("SELECT * FROM web_message");
    $Title = "";
    $useEmail = "";
    while ($row = $result->fetch_assoc()) {
        if ($row['Title'] == "使用邮箱") {
            $useEmail = $row['Content'];
        }
    }
    if ($useEmail == "否") {
        $stmt = $conn->prepare("INSERT INTO user(UserName, Email, Password,isVerified, isHidden, Theme,UserGroup)VALUES(?,?,?,'是','否','默认','user')");
        $stmt->bind_param("ssss", $_POST['username'], $_POST['email'], md5("#*#*4636" . md5($_POST['password']) . "114514*#*#"));
        $stmt->execute();
        $arr = ["isSucceed" => "成功"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    } else {
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
        $stmt = $conn->prepare("INSERT INTO user(UserName, Email, Password,VerifiedCode,Timeout,isVerified, isHidden, Theme)VALUES(?,?,?,?," . (time() + 600) . ",'否','否','默认')");
        $stmt->bind_param("ssss", $_POST['username'], $_POST['email'], md5("#*#*4636" . md5($_POST['password']) . "114514*#*#"), $VerifiledCode);
        $stmt->execute();
        $arr = ["isSucceed" => "成功"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
}
if ($_POST['function'] == "resendRegisterEmail") {
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
    $conn->query("UPDATE user SET VerifiedCode='$VerifiledCode',Timeout='" . (time() + 600) . "' WHERE Email='" . $_POST['email'] . "'");
    $arr = ["isSucceed" => "成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function'] == "login") {
    $stmt = $conn->prepare("SELECT Password,isVerified FROM user WHERE UserName=? OR Email=?");
    $stmt->bind_param("ss", $_POST['username'], $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($password, $isVerifild);
    if ($stmt->num_rows() != 1) {
        $arr = ["isSucceed" => "账户不存在"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $stmt->fetch();
    if (md5("#*#*4636" . md5($_POST['password']) . "114514*#*#") != $password) {
        $arr = ["isSucceed" => "密码错误"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    if ($isVerifild == "否") {
        $arr = ["isSucceed" => "账户未激活"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $TokenID = md5(md5($_POST['username']) . microtime(true));
    $Token = md5(md5($_POST['password']) . microtime(true));
    setcookie("TokenID", $TokenID, time() + 10 * 365 * 24 * 60 * 60, "/");
    setcookie("Token", $Token, time() + 10 * 365 * 24 * 60 * 60, "/");
    $conn->query("UPDATE user SET TokenID='$TokenID',Token='$Token' WHERE UserName='" . $_POST['username'] . "' OR Email='" . $_POST['username'] . "'");
    $arr = ["isSucceed" => "成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function'] == "logout") {
    //echo "UPDATE user SET TokenID=null,Token=null WHERE TokenID='".$_COOKIE['TokenID']."'";
    $conn->query("UPDATE user SET TokenID=null,Token=null WHERE TokenID='" . $_COOKIE['TokenID'] . "'");
    $arr = ["isSucceed" => "成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function'] == "find_password") {
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
    $VerifiledCode = md5($_POST['email'] . microtime(true));
    sendEmail($Host, $Secure, $Port, $ShowName, $sender, $senderPassword, $_POST['email'], $Title . "密码找回验证码", findPasswordEmail($Title, $local . "api/find_password_api.php?code=" . $VerifiledCode));
    $conn->query("UPDATE user SET VerifiedCode='$VerifiledCode',Timeout='" . (time() + 600) . "' WHERE Email='" . $_POST['email'] . "'");
    $arr = ["isSucceed" => "成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function'] == "submit_find_password") {
    $stmt = $conn->prepare("UPDATE user SET Password=? WHERE VerifiedCode=?");
    $password = md5("#*#*4636" . md5($_POST['password']) . "114514*#*#");
    $stmt->bind_param("ss", $password, $_POST['code']);
    $stmt->execute();
    $conn->query("UPDATE user SET VerifiedCode=null,TokenID=null,Token=null WHERE VerifiedCode='" . $_POST['code'] . "'");
    $arr = ["isSucceed" => "成功"];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function'] == "main_page") {
    $arr = [];

    $confessions = [];
    $result = $conn->query("SELECT confession.LID,confession.Title,confession.Content,
       confession.Hidden,confession.Likes,confession.SubmitTime,user.UserName,user.UID FROM confession,user WHERE user.UID=confession.UID ORDER BY LID DESC LIMIT 4");
    $confession_count = $result->num_rows;
    $confessions += ["confession_count" => $confession_count];
    $rows = [];
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($row['Hidden'] == "是")
            $row['UserName'] = "匿名";
        array_push($rows, $row);
    }
    $confessions += $rows;

    $secrets = [];
    $result = $conn->query("SELECT secret.LID,secret.Title,secret.Content,
       secret.Hidden,secret.Likes,secret.SubmitTime,user.UserName,user.UID FROM secret,user WHERE user.UID=secret.UID ORDER BY LID DESC LIMIT 4");
    $secret_count = $result->num_rows;
    $secrets += ["secret_count" => $secret_count];
    $rows = [];
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($row['Hidden'] == "是")
            $row['UserName'] = "匿名";
        array_push($rows, $row);
    }
    $secrets += $rows;

    $founds = [];
    $result = $conn->query("SELECT found.FID,found.Title,found.Content,
       found.Hidden,found.Likes,found.SubmitTime,user.UserName,user.UID FROM found,user WHERE user.UID=found.UID ORDER BY FID DESC LIMIT 4");
    $found_count = $result->num_rows;
    $founds += ["found_count" => $found_count];
    $rows = [];
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($row['Hidden'] == "是")
            $row['UserName'] = "匿名";
        array_push($rows, $row);
    }
    $founds += $rows;

    $transactions = [];
    $result = $conn->query("SELECT transaction.TID,transaction.Title,transaction.Content,
       transaction.Hidden,transaction.Likes,transaction.SubmitTime,user.UserName,user.UID FROM transaction,user WHERE user.UID=transaction.UID ORDER BY TID DESC LIMIT 4");
    $transaction_count = $result->num_rows;
    $transactions += ["transaction_count" => $transaction_count];
    $rows = [];
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($row['Hidden'] == "是") {
            $row['UserName'] = "匿名";
            $row['UID'] = null;
        }
        array_push($rows, $row);
    }
    $transactions += $rows;

    $users = [];
    $result = $conn->query("SELECT user.UserName,user_messages.Avatar,user.UID FROM user,user_messages WHERE user.UID=user_messages.UID AND user.isHidden='否' ORDER BY RAND() LIMIT 6");
    $user_count = $result->num_rows;
    $users += ["user_count" => $user_count];
    $rows = [];
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        array_push($rows, $row);
    }
    $users += $rows;

    $arr = ["confession" => $confessions] + ["secret" => $secrets] + ["found" => $founds] + ["transaction" => $transactions] + ["user" => $users];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function'] == "get_user_message") {
    if (@!$_COOKIE['Token']) {
        $arr = ["登录状态" => "未登录"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $result = $conn->query("SELECT * FROM user WHERE Token='" . $_COOKIE['Token'] . "'");
    $row = $result->fetch_assoc();
    $arr = ["登录状态" => "正常", "隐匿模式" => $row['isHidden'], "账户等级" => $row['UserGroup']];
}
if ($_POST['function'] == "confessions_page") {
    $result = $conn->query("SELECT confession.Title,user.UserName,user.UID,confession.Likes,confession.SubmitTime,confession.LID FROM confession,user WHERE confession.UID=user.UID ORDER BY LID DESC LIMIT 40");
    $confessions = [];
    $confessions_count = $result->num_rows;
    $confessions += ["confessions_count" => $confessions_count];
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        array_push($rows, $row);
    }
    $confessions += $rows;
    Response::json(200, "API successfully called", $confessions);
    exit(0);
}
if ($_POST['function'] == "confession_page") {
    $arr = [];
    $result = $conn->query("SELECT user_messages.Avatar,confession.Hidden,confession.Title,user.UserName,confession.Content,user.UID,confession.Likes,confession.SubmitTime,confession.LID,confession.Picture,confession.ContactType,confession.Contact FROM confession,user,user_messages WHERE user_messages.UID=user.UID AND confession.UID=user.UID AND confession.LID=" . $_POST['LID']);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $row['isHas'] = "是";
        if ($row['Hidden'] == "是") {
            $row['UserName'] = "匿名";
            $row['UID'] = null;
            $row['Avatar'] = "/sources/avatar/user-hidden.png";
        }
        $arr = ["confession" => $row];
    } else {
        $row['isHas'] = "否";
        $arr = ["confession" => $row];
    }
    $confessions = [];
    $result = $conn->query("SELECT confession.LID,confession.Title,confession.Content,
       confession.Hidden,confession.Likes,confession.SubmitTime,user.UserName,user.UID FROM confession,user WHERE user.UID=confession.UID ORDER BY LID DESC LIMIT 6");
    $confession_count = $result->num_rows;
    $confessions += ["confession_count" => $confession_count];
    $rows = [];
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($row['Hidden'] == "是") {
            $row['UserName'] = "匿名";
            $row['UID'] = null;
        }
        array_push($rows, $row);
    }
    $confessions += $rows;
    $arr += ["confessions" => $confessions];

    $comments = [];
    $result = $conn->query("SELECT confession_comment.Likes,user.isHidden,user.UID,user.UserName,user_messages.Avatar,confession_comment.SubmitTime,confession_comment.Content FROM user,confession_comment,user_messages WHERE user.UID=user_messages.UID AND user.UID=confession_comment.UID AND confession_comment.LID=" . $_POST['LID'] . " ORDER BY LCID DESC");
    $comments_count = $result->num_rows;
    $comments += ["comments_count" => $comments_count];
    $rows = [];
    $i = 1;
    if ($comments_count != 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['isHidden'] == "是") {
                $row['UserName'] = "匿名";
                $row['UID'] = null;
                $row['Avatar'] = null;
            }
            array_push($rows, $row);
        }
        $comments += $rows;
    }
    $arr += ["comments" => $comments];
    Response::json(200, "API successfully called", $arr);
    exit(0);
}
if ($_POST['function'] == "uploadPic") {
    if (!$_COOKIE['TokenID']&&!$_COOKIE['Token']){
        $arr = ["isUploaded" => "false","error"=>"未登录"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $result=$conn->query("SELECT UID,isBanned,isHidden FROM user WHERE Token='".$_COOKIE['Token']."' AND TokenID='".$_COOKIE['TokenID']."'");
    if ($result->num_rows==0){
        $arr = ["isUploaded" => "false","error"=>"未登录"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $pic = $_FILES["file"];
    $isMatched = preg_match('/.(jpg|jpeg|png|JPG|PNG)$/', $pic["name"]);
    if (!$isMatched) {
        $arr = ["isUploaded" => "false", "error" => "您上传的文件格式错误！"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    if ($pic["size"] > 10 * 1024 * 1024) {
        $arr = ["isUploaded" => "false", "error" => "您上传的文件过大！"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $end = "";
    if (preg_match('/(.jpg)$/', $pic['name']))
        $end = ".jpg";
    if (preg_match('/(.jpeg)$/', $pic['name']))
        $end = ".jpeg";
    if (preg_match('/(.png)$/', $pic['name']))
        $end = ".png";
    if (preg_match('/(.JPG)$/', $pic['name']))
        $end = ".JPG";
    if (preg_match('/(.PNG)$/', $pic['name']))
        $end = ".PNG";

    if ($end == "") {
        $arr = ["isUploaded" => "false", "error" => "服务器函数错误！"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }

    $name = md5($pic["name"] . microtime(true));
    $path = "../images/uploaded/" . $name . $end;
    if (move_uploaded_file($pic['tmp_name'], $path)) {
        $arr = ["isUploaded" => "true", "location" => "images/uploaded/" . $name . $end];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    } else {
        $arr = ["isUploaded" => "false", "error" => "服务器错误！"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
}
if ($_POST['function']=="release_new"){
    if (!$_COOKIE['TokenID']&&!$_COOKIE['Token']){
        $arr = ["isSucceed" => "false","error"=>"未登录"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $result=$conn->query("SELECT UID,isBanned,isHidden FROM user WHERE Token='".$_COOKIE['Token']."' AND TokenID='".$_COOKIE['TokenID']."'");
    if ($result->num_rows==0){
        $arr = ["isSucceed" => "false","error"=>"未登录"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $row=$result->fetch_assoc();
    if ($row['isBanned']){
        $arr = ["isSucceed" => "false","error"=>"您的账户已被封禁！"];
        Response::json(200, "API successfully called", $arr);
        exit(0);
    }
    $UID=$row['UID'];
    $isHidden=$row['isHidden'];
    $Hide="否";
    if ($_POST['anonymous']=="true")
        $Hide="是";
    elseif ($_POST['anonymous']=="global")
        if ($isHidden=="是")
            $Hide="是";



    switch ($_POST['type']){
        case "confession":{
            $stmt = $conn->prepare("INSERT INTO confession(UID, Hidden, Title,Content,Picture,ContactType,Contact)VALUES(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss", $UID, $Hide, $_POST['title'],$_POST['content'],$_POST['picture'],$_POST['contact'],$_POST['contact_details']);
            $stmt->execute();
            $result=$conn->query("SELECT LID FROM confession WHERE UID='$UID' ORDER BY SubmitTime DESC ");
            $row=$result->fetch_assoc();
            $arr = ["isSucceed" => "成功","location"=>"confession.php?LID=".$row['LID']];
            Response::json(200, "API successfully called", $arr);
            exit(0);
        }
        default:{
            $arr = ["isSucceed" => "false","error"=>"类型错误！"];
            Response::json(200, "API successfully called", $arr);
            exit(0);
        }
    }
}