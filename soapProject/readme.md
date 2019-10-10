### 自动生成wsdl 及 调试

#### 第一步 创建服务文件
   * soapHandle.class.php
   
#### 第二步 准备自动生成文件
创建文件 cw.php

    <?php
    include("soapHandle.class.php");
    include("SoapDiscovery.class.php");
    
    $disco = new SoapDiscovery('soapHandle', 'myService'); //第一个参数是类名（生成的wsdl文件就是以它来命名的），即Service类，第二个参数是服务的名字（这个可以随便写）。
    $disco->getWSDL();
    
#### 第三步 运行cw.php
* 用浏览器（命令行不行）访问cw.php 文件，将生成wsdl文件

#### 第四步 创建服务
创建文件service.php 

    <?php
        include_once("soapHandle.class.php");
        
        $server = new SoapServer('soapHandle.wsdl', array('soap_version' => SOAP_1_2)); ##此处的Service.wsdl文件是上面生成的
        $server->setClass("soapHandle"); //注册Service类的所有方法 
        $server->handle(); //处理请求
        
#### 第五步 创建客服端文件
创建客户端文件 client.php

    <?php
    // ini_set('soap.wsdl_cache_enabled', "0"); //关闭wsdl缓存
    $soap = new SoapClient("http://127.0.0.1/soapProject/autoWsdl/service.php?WSDL" , array('trace'=>true));
    // $soap = new SoapClient('http://127.0.0.1/soapProject/autoWsdl/service.php?wsdl');
    echo $soap->strtolink('http://www.baidu.com')."<br/>";
    var_dump($soap->strtolink('http://www.baidu.com'));
    //调用方式1
    echo $soap->add(28, 100)."<br/>";
    //调用方式2
    echo $soap->__soapCall('add',array(28,200))."<br/>";
    //调用方式3
    echo $soap->__Call('add',array(28,300))."<br/>";
    echo date('Y-m-d H:i:s', time());
    
#### 第六步 发起访问
* 命令行运行 client.php
* 浏览器访问 client.php

#### 注意
* service.php 中不能有多余的输出


