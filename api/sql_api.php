<?php
require_once "config.php";
function getConn(){
    return mysqli_connect(servername,username,password,db);
}