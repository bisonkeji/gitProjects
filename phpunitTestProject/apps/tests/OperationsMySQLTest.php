<?php
/*
 * This file is part of DbUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
// require_once "../../../../autoload.php";
use PHPUnit\DbUnit\Database\DefaultConnection;
use PHPUnit\DbUnit\DataSet\CompositeDataSet;
use PHPUnit\DbUnit\DataSet\DefaultDataSet;
use PHPUnit\DbUnit\DataSet\DefaultTable;
use PHPUnit\DbUnit\DataSet\DefaultTableMetadata;
use PHPUnit\DbUnit\DataSet\FlatXmlDataSet;
use PHPUnit\DbUnit\Operation\Truncate;
use PHPUnit\DbUnit\TestCase;

require_once "./" . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'DatabaseTestUtility.php';

class Extensions_Database_Operation_OperationsMySQLTest extends TestCase
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
        return new FlatXmlDataSet(__DIR__ . '/_files/OperationsMySQLTestFixture.xml');
    }

    /**
     * @covers Truncate::execute
     */
    // public function testTruncate(): void
    // {
    //     $truncateOperation = new Truncate();
    //     $truncateOperation->execute($this->getConnection(), $this->getDataSet());

    //     $expectedDataSet = new DefaultDataSet([
    //         new DefaultTable(
    //             new DefaultTableMetadata(
    //                 'table1',
    //                 ['table1_id', 'column1', 'column2', 'column3', 'column4']
    //             )
    //         ),
    //         new DefaultTable(
    //             new DefaultTableMetadata(
    //                 'table2',
    //                 ['table2_id', 'table1_id', 'column5', 'column6', 'column7', 'column8']
    //             )
    //         ),
    //         new DefaultTable(
    //             new DefaultTableMetadata(
    //                 'table3',
    //                 ['table3_id', 'table2_id', 'column9', 'column10', 'column11', 'column12']
    //             )
    //         ),
    //         new DefaultTable(
    //             new DefaultTableMetadata(
    //                 'user',
    //                 ['id', 'name']
    //             )
    //         )
            
    //     ]);

    //     $this->assertDataSetsEqual($expectedDataSet, $this->getConnection()->createDataSet());
    // }

    public function getCompositeDataSet()
    {
        $compositeDataset = new CompositeDataSet();

        $dataset = $this->createXMLDataSet( './_files/TruncateCompositeTest.xml');
        $compositeDataset->addDataSet($dataset);

        return $compositeDataset;
    }

    // public function testTruncateComposite(): void
    // {
    //     $truncateOperation = new Truncate();
    //     $truncateOperation->execute($this->getConnection(), $this->getCompositeDataSet());

    //     $expectedDataSet = new DefaultDataSet([
    //         new DefaultTable(
    //             new DefaultTableMetadata(
    //                 'table1',
    //                 ['table1_id', 'column1', 'column2', 'column3', 'column4']
    //             )
    //         ),
    //         new DefaultTable(
    //             new DefaultTableMetadata(
    //                 'table2',
    //                 ['table2_id', 'table1_id', 'column5', 'column6', 'column7', 'column8']
    //             )
    //         ),
    //         new DefaultTable(
    //             new DefaultTableMetadata(
    //                 'table3',
    //                 ['table3_id', 'table2_id', 'column9', 'column10', 'column11', 'column12']
    //             )
    //         ),
    //     ]);

    //     $this->assertDataSetsEqual($expectedDataSet, $this->getConnection()->createDataSet());
    // }

    public function testFilteredGuestbook()
    {
        $tableNames = ['user'];
        $queryTable = $this->getConnection()->createQueryTable('user', 'SELECT * FROM user');
        //$dataSet = $this->getConnection()->createDataSet($tableNames);
        // ...
        //$expectedDataSet = []; 
        $expectedDataSet = new DefaultDataSet([
            new DefaultTable(
                new DefaultTableMetadata(
                    'user',
                    ['id', 'name']
                )
            )]
        );

        $this->assertDataSetsEqual($expectedDataSet,$this->getConnection()->createDataSet());

    }
}