<?php
require_once "config.php";
function getConn(){
    return new mysqli(servername,username,password,db);
}