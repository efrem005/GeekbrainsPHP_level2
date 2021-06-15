<?php

namespace app\interfaces;


interface IDb
{
//    public function __construct(Db $db);
//    public function getDb();
    public function executeQuery($sql);
    public function getAssocResult($sql);
    public function closeDb();
}