<?php

require_once "../dbconnect/Db.php";
use apps\dbconnect\Db;

class myFixteure
{
    function updata($id ,$name)
    {
        $db = Db::connect();
        $sql = "update test.user set name='".$name."' where id=".$id;
        $ret = $db->exec($sql);
    }

    static function fixtureDb()
    {
        //删除数据
        $db = Db::connect();
        $sql = "delete mydata.user where id=2";
        $ret = $db->exec($sql);

        //添加数据
        $sql = "insert into mydata.user 
                select * from test.user where id = 2";
        $ret = $db->exec($sql);
    }

}

// $op = new User();
// $op->updata(2,'hhah');