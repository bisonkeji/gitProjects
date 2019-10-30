<?php
/**
 * Created by PhpStorm.
 * User: wangfq
 * Date: 2019/10/17
 * Time: 18:39
 */

require_once __DIR__ . '/../../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


//创建连接
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

//声明队列
$channel->queue_declare('hello', false, false, false, false);

//发布消息
$msg = new AMQPMessage('Hello World3!');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello World!'\n";

try{
    $channel->close();
    $connection->close();
}catch (\Exception $e){
    echo "exception :".$e->getMessage() . "\n";
}

