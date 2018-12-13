<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once "../dbconnect/Db.php";
require_once "./_files/DatabaseTestUtility.php";
require_once "./_files/testDbConnect.php";

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
    //     $tableNames = ['user'];
    //     $queryTable = $this->getConnection()->createQueryTable('user', 'SELECT * FROM user');
    //     //$dataSet = $this->getConnection()->createDataSet($tableNames);
    //     // ...
    //     //$expectedDataSet = []; 
    //     $expectedDataSet = new DefaultDataSet([
    //         new DefaultTable(
    //             new DefaultTableMetadata(
    //                 'user',
    //                 ['id', 'name']
    //             )
    //         )]
    //     );

    //     $this->assertDataSetsEqual($expectedDataSet,$this->getConnection()->createDataSet());

    // }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(__DIR__ . '/_files/myuser.xml');
        //return $this->createFlatXMLDataSet(__DIR__ . '/_files/OperationsMySQLTestFixture.xml');
    }


    // public function testUser()
    // {
        
    //     // ...
    //     //$expectedDataSet = []; 
        // $expectedDataSet = new DefaultDataSet([
        //     new DefaultTable(
        //         new DefaultTableMetadata(
        //             'user',
        //             ['id', 'name']
        //         )
        //     )]
        // );

    //     $this->assertDataSetsEqual($expectedDataSet,$this->getConnection()->createDataSet());

    // }

    public function testComplexQuery()
    {
        $queryTable = $this->getConnection()->createQueryTable(
            'user', 'SELECT * from user'
        );
        $expectedTable = $this->createFlatXmlDataSet(__DIR__ . '/_files/myuser.xml')
                              ->getTable("user");
        $this->assertTablesEqual($expectedDataSet, $queryTable);
    }

}