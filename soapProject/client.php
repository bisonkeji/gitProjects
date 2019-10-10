<?php
ini_set('soap.wsdl_cache_enabled', "0"); //关闭wsdl缓存
$soap = new SoapClient("http://127.0.0.1:80/myGitProject/gitProjects/soapProject/service.php?wsdl" , array('trace'=>true));
// $soap = new SoapClient('http://127.0.0.1/soapProject/autoWsdl/service.php?wsdl');
echo $soap->strtolink('http://www.baidu.com')."<br/>";  // strtolink 方法在soapHandle.class.php 中定义
var_dump($soap->strtolink('http://www.baidu.com'));
//调用方式1
echo $soap->add(28, 100)."<br/>"; // add 方法在soapHandle.class.php 中定义
//调用方式2
echo $soap->__soapCall('add',array(28,200))."<br/>";
//调用方式3
echo $soap->__Call('add',array(28,300))."<br/>";
echo date('Y-m-d H:i:s', time());