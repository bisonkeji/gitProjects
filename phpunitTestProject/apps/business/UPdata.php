<?php

require_once "../dbconnect/Db.php";
use apps\dbconnect\Db;
class User
{
    function updata($id ,$name)
    {
        $db = Db::connect();
        $sql = "update test.user set name='".$name."' where id=".$id;
        $ret = $db->exec($sql);
    }

}

// $op = new User();
// $op->updata(2,'hhah');