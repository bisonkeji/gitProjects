<?php
require './vendor/autoload.php';
date_default_timezone_set('PRC');
//use Monolog\Logger;
//use Monolog\Handler\StdoutHandler;
// Create the logger
//$logger = new Logger('my_logger');
// Now add some handlers
//$logger->pushHandler(new StdoutHandler());

$config = \Kafka\ProducerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('localhost:9092');
$config->setBrokerVersion('1.0.0');
$config->setRequiredAck(1);
$config->setIsAsyn(false);
$config->setProduceInterval(500);
$producer = new \Kafka\Producer(
    function() {
        return [
            [
                'topic' => 'test0811',
                'value' => 'test....message.112233',
                'key' => 'testkey',
            ],
        ];
    }
);
//$producer->setLogger($logger);
$producer->success(function($result) {
    var_dump($result);
});
$producer->error(function($errorCode) {
    var_dump($errorCode);
});
$producer->send(true);