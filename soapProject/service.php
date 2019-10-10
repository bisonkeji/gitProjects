<?php

include_once("soapHandle.class.php");

$server = new SoapServer('soapHandle.wsdl', array('soap_version' => SOAP_1_2)); ##此处的Service.wsdl文件是上面生成的
$server->setClass("soapHandle"); //注册Service类的所有方法
$server->handle(); //处理请求
