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
    $stmt=$conn->prepare("SELECT UID FROM user WHERE UserName=? OR Email=?");
    $stmt->bind_param($_POST['username'],$_POST['email']);
    $stmt->execute();
    $stmt->bind_result($isHas);
    $arr=["isSucceed"=>"$isHas"];
    Response::json(200, "API successfully called", $arr);
}