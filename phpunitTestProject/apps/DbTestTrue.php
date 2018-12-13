<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once "dbconnect/Db.php";
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class MySqlGuestbookTest extends TestCase
{
    use TestCaseTrait;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $dbms='mysql';     //数据库类型
        $host='localhost'; //数据库主机名
        $dbName='test';    //使用的数据库
        $user='root';      //数据库连接用户名
        $pass='root';          //对应的密码
        $dsn="$dbms:host=$host;dbname=$dbName";
        $pdo = new \PDO($dsn, $user, $pass); //初始化一个PDO对象
        //$pdo = new PDO('mysql:...', $user, $password);
        return $this->createDefaultDBConnection($pdo, ':memory:');
    }

    public function testGuestbook()
    {
        $dataSet = $this->getConnection()->createDataSet();
        // ...
    }

    public function testFilteredGuestbook()
    {
        $tableNames = ['user'];
        $queryTable = $this->getConnection()->createQueryTable('user', 'SELECT * FROM user');
        //$dataSet = $this->getConnection()->createDataSet($tableNames);
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
?>