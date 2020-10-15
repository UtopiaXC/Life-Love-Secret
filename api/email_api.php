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

function verifiedEmail($Title,$code){
    return "
    <tr><td style='background-color:#fff'><div class='wui-FileReadList paraStyle' style=''><div class='text'><div class='txt'><div class='mailMainArea' style='font-size: 14px; font-family: Verdana, 宋体, Helvetica, sans-serif; line-height: 1.66; padding: 8px 10px; margin: 0px; width: 700px;'><div>
    <table cellpadding='0' align='center' style='overflow:hidden;background:#fff;margin:0 auto;text-align:left;position:relative;font-size:14px; font-family:'lucida Grande',Verdana;line-height:1.5;box-shadow:0 0 3px #ccc;border:1px solid #ccc;border-radius:5px;border-collapse:collapse;'>
        <tbody>
        <tr>
            <th valign='middle' style='height:38px;color:#fff; font-size:14px;line-height:38px; font-weight:bold;text-align:left;padding:10px 24px 6px; border-bottom:1px solid #842ec4;background:#874ac6;border-radius:5px 5px 0 0;'>
        $Title</th>
        </tr>
        <tr>
            <td>
                <div style='padding:20px 35px 40px;'>
                    <h2 style='font-weight:bold;margin-bottom:5px;font-size:14px;'>欢迎来到$Title</h2>
                    <p style='margin-top:20px'>
        请点击 <a target='_blank' href='$code' _act='check_domail'>$code</a> 来激活您的账户！
                    </p>
                    <p style='margin-top:20px'>
        本验证地址有效期为十分钟。
                    </p>
                    <p style='margin-left:2em;'></p>
                    <p style='text-indent:0;text-align:right;'>$Title</p>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div></div></div></div></div></td></tr>
    
    
    
    ";
}

function findPasswordEmail($Title,$code){
    return "
    <tr><td style='background-color:#fff'><div class='wui-FileReadList paraStyle' style=''><div class='text'><div class='txt'><div class='mailMainArea' style='font-size: 14px; font-family: Verdana, 宋体, Helvetica, sans-serif; line-height: 1.66; padding: 8px 10px; margin: 0px; width: 700px;'><div>
    <table cellpadding='0' align='center' style='overflow:hidden;background:#fff;margin:0 auto;text-align:left;position:relative;font-size:14px; font-family:'lucida Grande',Verdana;line-height:1.5;box-shadow:0 0 3px #ccc;border:1px solid #ccc;border-radius:5px;border-collapse:collapse;'>
        <tbody>
        <tr>
            <th valign='middle' style='height:38px;color:#fff; font-size:14px;line-height:38px; font-weight:bold;text-align:left;padding:10px 24px 6px; border-bottom:1px solid #842ec4;background:#874ac6;border-radius:5px 5px 0 0;'>
        $Title</th>
        </tr>
        <tr>
            <td>
                <div style='padding:20px 35px 40px;'>
                    <h2 style='font-weight:bold;margin-bottom:5px;font-size:14px;'>找回您的账户</h2>
                    <p style='margin-top:20px'>
        请点击 <a target='_blank' href='$code' _act='check_domail'>$code</a> 来重置您的账户密码！
                    </p>
                    <p style='margin-top:20px'>
        本重置地址有效期为十分钟。
                    </p>
                    <p style='margin-left:2em;'></p>
                    <p style='text-indent:0;text-align:right;'>$Title</p>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div></div></div></div></div></td></tr>
    
    
    
    ";
}