<?php
require_once "dbconnect/Db.php";
use apps\dbconnect\Db;
class DbUnitTest
{
    function dbFirstTest(){
        $db = Db::connect();
        $sql = "select * from user";
        $rows = $db->query($sql);
        foreach ($rows as $row) {
            print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
        }
        //var_dump($row);
    }
    
}

$dbtest = new DbUnitTest();
$dbtest->dbFirstTest();