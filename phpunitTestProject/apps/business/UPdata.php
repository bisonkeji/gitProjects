<?php

require_once "../dbconnect/Db.php";
use apps\dbconnect\Db;
class User
{
    static function updata($id ,$name)
    {
        $db = Db::connect();
        $sql = "update mydata.user set name='".$name."' where id=".$id;
        $ret = $db->exec($sql);
    }

    static function insert($id ,$name)
    {
        $db = Db::connect();
        $sql = "insert into mydata.user select $id,'$name'";
        $ret = $db->exec($sql);
    }


}

// $op = new User();
// $op->updata(2,'hhah');