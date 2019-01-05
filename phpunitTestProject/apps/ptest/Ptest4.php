<?php
require_once "../dbconnect/Db.php";
require_once "./_files/DatabaseTestUtility.php";
require_once "./_files/testDbConnect.php";
require_once "../business/UPdata.php";
require_once "../business/Common.php";
require_once "../business/myFixteure.php";

// require_once "../../../../autoload.php";
use PHPUnit\DbUnit\Database\DefaultConnection;
use PHPUnit\DbUnit\DataSet\CompositeDataSet;
use PHPUnit\DbUnit\DataSet\DefaultDataSet;
use PHPUnit\DbUnit\DataSet\DefaultTable;
use PHPUnit\DbUnit\DataSet\DefaultTableMetadata;
use PHPUnit\DbUnit\DataSet\FlatXmlDataSet;
use PHPUnit\DbUnit\Operation\Truncate;
use PHPUnit\DbUnit\TestCase;

//equire_once \dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'DatabaseTestUtility.php';
require_once "./_files/DatabaseTestUtility.php";
class OperationsMysqltest extends TestCase
{
    protected function setUp(): void
    {
        if (!\extension_loaded('pdo_mysql')) {
            $this->markTestSkipped('pdo_mysql is required to run this test.');
        }

        if (!\defined('PHPUNIT_TESTSUITE_EXTENSION_DATABASE_MYSQL_DSN')) {
            $this->markTestSkipped('No MySQL server configured for this test.');
        }

        parent::setUp();
    }

    public function getConnection()
    {
        return new DefaultConnection(DBUnitTestUtility::getMySQLDB(), 'mysql');
    }

    public function getDataSet()
    {
        return new FlatXmlDataSet(__DIR__ . '/_files/myuser.xml');
    }

    public function testmanysql()
    {
        $dataSet = $this->getConnection()
                   ->createDataSet(['mydata.user','mydata.userinfo']);
        $expectedDataSet = $this->createFlatXmlDataSet(__DIR__ . '/_files/expect2.xml');
        $this->assertDataSetsEqual($expectedDataSet, $dataSet);
    }


    



    

}
