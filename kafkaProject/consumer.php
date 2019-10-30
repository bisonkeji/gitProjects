<?php
require './vendor/autoload.php';
date_default_timezone_set('PRC');
//use Monolog\Logger;
//use Monolog\Handler\StdoutHandler;
// Create the logger
//$logger = new Logger('my_logger');
// Now add some handlers
//$logger->pushHandler(new StdoutHandler());

$config = \Kafka\ConsumerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('localhost:9092');
$config->setGroupId('test');
$config->setBrokerVersion('0.9.0.1');
$config->setTopics(array('test0811'));
//$config->setOffsetReset('earliest');
$consumer = new \Kafka\Consumer();
//$consumer->setLogger($logger);
$topics = \Kafka\Consumer\Assignment::getInstance()->getTopics();
var_dump($topics);


$consumer->start(function($topic, $part, $message) {
    var_dump($message);
});

