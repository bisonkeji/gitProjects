<?php
//namespace apps;

//echo __DIR__ . '/../vendor/autoload.php';exit();
require_once __DIR__ . '/../vendor/autoload.php';
require_once "dbconnect/Db.php";

define("ROOT_PATH", __DIR__ . "/");

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

use apps\dbconnect\Db;

class MyGuestbookTest extends TestCase
{
    use TestCaseTrait;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        // $pdo = new PDO('sqlite::memory:');
        // return $this->createDefaultDBConnection($pdo, ':memory:');
        $pdo = Db::connect();
        return $this->createDefaultDBConnection($pdo,'test');
    }

    
    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/guestbook-seed.xml');
    }
}