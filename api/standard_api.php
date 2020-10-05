<?php
require_once "email_api.php";
require_once "Response.php";

//API返回格式
header('Content-Type:text/json;charset=utf-8');

//以下为测试代码块
//创建数组
//$arr = [
//    "EmailStatue"=>"Succeed"
//];
//
//Response::json(200, "API successfully called", $arr);