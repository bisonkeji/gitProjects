<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once "../dbconnect/Db.php";
require_once "./_files/DatabaseTestUtility.php";
require_once "./_files/testDbConnect.php";
require_once "../business/UPdata.php";

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\DbUnit\Database\DefaultConnection;
use PHPUnit\DbUnit\DataSet\DefaultDataSet;
use PHPUnit\DbUnit\DataSet\DefaultTable;
use PHPUnit\DbUnit\DataSet\CompositeDataSet;
use PHPUnit\DbUnit\DataSet\DefaultTableMetadata;
use PHPUnit\DbUnit\DataSet\FlatXmlDataSet;
use PHPUnit\DbUnit\Operation\Truncate;

class Dbtest extends TestCase
{
    use TestCaseTrait;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        return new DefaultConnection(DBUnitTestUtility::getMySQLDB(), 'mysql');
    }

    // public function testGuestbook()
    // {
    //     $dataSet = $this->getConnection()->createDataSet();
    //     // ...
    // }

    // public function testFilteredGuestbook()
    // {
    //     $tableNames = ['user'];
    //     $dataSet = $this->getConnection()->createDataSet($tableNames);
    //     // ...
    // }

    // public function testFilteredGuestbook()
    // {
    //     // $opuser = new User();
    //     // $opuser->updata(2,"hhaha");

    //     $tableNames = ['user'];
    //     //$queryTable = $this->getConnection()->createQueryTable('user', 'SELECT * FROM user');
    //     $dataSet = $this->getConnection()->createDataSet($tableNames);
    //     // ...
    //     //$expectedDataSet = []; 
    //     $tableUser = new DefaultTable(
    //         new DefaultTableMetadata(
    //             'user',
    //             ['id', 'name'],['id']
    //         )
    //         );
    //     $tableUser->addRow(['id'=>'1','name'=>'hugee2']);
    //     $expectedDataSet = new DefaultDataSet([
    //         $tableUser
    //         ]
    //     );
    //     //$expectedDataSet = $this->createFlatXMLDataSet(__DIR__ . '/_files/myuser.xml');
    //     $this->assertDataSetsEqual($expectedDataSet,$dataSet);
    // }

    // public function testAddEntry()
    // {
    //     $this->assertEquals(1, $this->getConnection()->getRowCount('user'), "Pre-Condition");

    //     // $guestbook = new Guestbook();
    //     // $guestbook->addEntry("suzy", "Hello world!");

    //     $this->assertEquals(1, $this->getConnection()->getRowCount('user'), "Inserting failed");
    // }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(__DIR__ . '/_files/myuser.xml');
        //return $this->createFlatXMLDataSet(__DIR__ . '/_files/OperationsMySQLTestFixture.xml');
    }

    public function testComplexQuery()
    {
        $queryTable = $this->getConnection()->createQueryTable(
            'test.user', 'SELECT * from `test`.`user`'
        );

        $queryTable2 = $this->getConnection()->createQueryTable(
            'test.user', 'SELECT * from `test`.`user`'
        );

        $expectedTable = $this->createFlatXmlDataSet(__DIR__ . '/_files/myuser.xml')
                              ->getTable("test.user");
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

    public function testComplexQuery2()
    {
        $queryTable = $this->getConnection()->createQueryTable(
            'test.user', 'SELECT * from `test`.`user`'
        );

        $queryTable2 = $this->getConnection()->createQueryTable(
            'mydata.user', 'SELECT * from `mydata`.`user`'
        );

        $expectedTable = $this->createFlatXmlDataSet(__DIR__ . '/_files/myuser.xml')
                              ->getTable("test.user");
        $this->assertTablesEqual($queryTable2, $queryTable);
    }

}