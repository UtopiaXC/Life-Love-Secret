<?php


class Response {
    public static function json($code, $message = '', $data = []){
        $result = [
            "code" => $code,
            "message" => $message,
            "data" => $data
        ];
        echo json_encode($result);
        exit;
    }
}