<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once "../dbconnect/Db.php";
require_once "./_files/DatabaseTestUtility.php";
require_once "./_files/testDbConnect.php";
require_once "../business/UPdata.php";
require_once "../business/Common.php";

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\DbUnit\Database\DefaultConnection;
use PHPUnit\DbUnit\DataSet\DefaultDataSet;
use PHPUnit\DbUnit\DataSet\DefaultTable;
use PHPUnit\DbUnit\DataSet\CompositeDataSet;
use PHPUnit\DbUnit\DataSet\DefaultTableMetadata;
use PHPUnit\DbUnit\DataSet\FlatXmlDataSet;
use PHPUnit\DbUnit\Operation\Truncate;

class Ptest1 extends TestCase
{

    public function testSum()
    {
        $sumRet = \Common::sum(1,2);
        $this->assertEquals(3, $sumRet);
        $this->assertEquals(3, $sumRet);
    }

    /**
     * @dataProvider Sum2Provider
     */
    public function testSum2($a, $b, $expected)
    {
        
        $sumRet = \Common::sum($a,$b);
        $this->assertEquals($expected, $sumRet);
    }
    

    public function Sum2Provider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3]
        ];
    }
}