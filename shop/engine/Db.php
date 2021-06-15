<?php

namespace app\engine;

use app\interfaces\IDb;

class Db implements IDb
{
    public $db = null;

    public function getDb()
    {
        static $db = null;
        if (is_null($db)) {
            $db = new \PDO('mysql:host=localhost:3306;dbname=shop', 'root', 'root');
        }
        return $this->db;
    }

    public function executeQuery($sql)
    {
//        @mysqli_query($this->getDb(), $sql) or die(mysqli_error(getDb()));
//        return mysqli_affected_rows($this->getDb()) == 0 ?false:true;

        return "{$sql} <br>";
    }

    public function getAssocResult($sql)
    {
//        $db = $this->getDb();
//        $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
//
//        $array_result = [];
//        while ($row = mysqli_fetch_assoc($result))
//            $array_result[] = $row;
//        return $array_result;
        return "{$sql} <br>";
    }

    public function closeDb() {
        mysqli_close($this->getDb());
    }
}