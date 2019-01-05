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

//equire_once \dirname(__DIR__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . 'DatabaseTestUtility.php';
require_once "./_files/DatabaseTestUtility.php";
class OperationsMysqltest extends TestCase
{
    protected function setUp(): void
    {
        // if (!\extension_loaded('pdo_mysql')) {
        //     $this->markTestSkipped('pdo_mysql is required to run this test.');
        // }

        // if (!\defined('PHPUNIT_TESTSUITE_EXTENSION_DATABASE_MYSQL_DSN')) {
        //     $this->markTestSkipped('No MySQL server configured for this test.');
        // }

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
    
    function testsum()
    {
        $this->assertEquals(3, 1+2);
    }
}
