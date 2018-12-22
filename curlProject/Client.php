<?php
require_once "./MyCrul.php";
class Client
{
    function getTest()
    {
        $url = "http://127.0.0.1/gitProjects/curlProject/Server.php?id=1&name=hugee";
        $url = "http://127.0.0.1/gitProjects/curlProject/Server.php";
        $method = "PUT";
        $source = "./testFile.txt"; 
        $params = [
            'id2'=>2,
            'name'=>'hugee',
            //'file'=>"@./testFile.txt", //php<=5.5
            //'file' => new \CURLFile(realpath($source)) //php>=5.5
        ];
        //$data = array('file' => new \CURLFile(realpath($source)));//>=5.5
        //$params = "postvar1=value1&postvar2=value2&postvar3=value3";
        //$params = json_encode($params);
        $auth = "";
        $ret = MyCrul::curl($url,$method,$params,$auth);
        //$ret = MyCrul::curl_request($url,$method);
        //$ret = MyCrul::curlPost($url,$params);
        echo "\n======\n";
        var_dump($ret);
    }
}

$clientObj = new Client();
$clientObj->getTest();