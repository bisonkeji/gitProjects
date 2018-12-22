<?php
require_once "./NetCommon.php";
class Server
{
    public function curlTest()
    {
        $ret = $_REQUEST;
        $headers = NetCommon::Mygetallheaders();
        //$post = json_decode($_POST,true);
        echo  json_encode([
            'code'=>0,
            'des'=>'hhahah',
            'request'=>json_encode($ret),
            'headers'=>$headers,
            'post'=>$_POST,
            'id' =>2,
            'file'=>$_FILES
        ]);
    }
}

$serverObj = new Server();
$serverObj->curlTest();
