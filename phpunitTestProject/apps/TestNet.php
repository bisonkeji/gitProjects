<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once "dbconnect/Db.php";
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class DBTest extends TestCase 
{ 
    /** 
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection 
     */ 
    public function getConnection() 
    { 
        $pdo = new PDO('mysql::dbname=test;host=127.0.0.1', 'root', 'root'); 
        return $this->createDefaultDBConnection($pdo, 'test'); 
    } 


    public function testGuestbook()
    {
        $dataSet = $this->getConnection()->createDataSet();
        // ...
    }


    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/myuser.xml');
    }

}