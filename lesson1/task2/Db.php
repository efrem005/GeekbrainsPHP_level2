<?php

class Db {

    protected $table;
    protected $wheres;

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        if(!empty($this->wheres)){
            $sql .= " WHERE ";
            foreach ($this->wheres as $item){
                foreach ($item as $key => $value) {
                    $sql .= $key . " = " . $value;
                    if ($item != end($this->wheres)) $sql .= " AND ";
                }
            }
            $this->wheres = [];
        }
        return $sql . PHP_EOL;
    }
    public function getOne($id)
    {
        return "SELECT * FROM {$this->table} WHERE id = {$id}" . PHP_EOL;
    }
    public function where($value)
    {
        $this->wheres[] = $value;
        return $this;
    }

    public function andWhere($value)
    {
        return $this->where($value);
    }
}

$db = new Db();

echo $db->table('users')->getAll();
echo $db->table('users')->getOne(5);
echo $db->table('users')->where(['login' => 'Admin'])->getAll();
echo $db->table('users')->where(['login' => 'Admin'])->andWhere(['pass' => '123'])->getAll();
echo $db->table('users')->where(['login' => 'Admin'])->andWhere(['pass' => '123'])->andWhere(['hash' => '345345345'])->getAll();
