<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/Exception.php");
require_once("PHPMailer/SMTP.php");

function sendEmail($Host, $Secure, $Port,
                   $ShowName, $sender, $senderPassword,
                   $receiver, $Title, $Content){
    // 实例化PHPMailer核心类
    $mail = new PHPMailer();
    // 调试模式
    //$mail->SMTPDebug = 1;

    // 使用smtp鉴权方式发送邮件
    $mail->isSMTP();
    // smtp需要鉴权 这个必须是true
    $mail->SMTPAuth = true;
    // 发件服务器地址
    $mail->Host = $Host;
    // 设置加密方式
    if ($Secure==""||$Secure==null||$Secure==false){
        $mail->SMTPSecure = false;
        $mail->SMTPAutoTLS=false;
    }else
        $mail->SMTPSecure = $Secure;
    // 设置远程服务器端口号
    $mail->Port = $Port;
    // 设置发送的邮件的编码
    $mail->CharSet = 'UTF-8';
    // 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->FromName = $ShowName;
    // smtp登录的账号
    $mail->Username = $sender;
    // smtp登录的密码
    $mail->Password = $senderPassword;
    // 设置发件人邮箱地址
    $mail->From = $sender;
    // 邮件正文html编码
    $mail->isHTML(true);
    // 设置收件人邮箱地址
    $mail->addAddress($receiver);
    // 添加该邮件的主题
    $mail->Subject = $Title;
    // 添加邮件正文
    $mail->Body = $Content;
    // 为该邮件添加附件
    //$mail->addAttachment('./example.pdf');
    // 发送邮件 返回状态
    $status = $mail->send();
    return $status;
}

