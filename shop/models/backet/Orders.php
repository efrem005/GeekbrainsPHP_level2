<?php

namespace app\models\backet;


class Orders
{
    public $id;
    public $name;
    public $phone;
    public $session_id;

    protected $db;

    public function __construct
    (
        $name = null,
        $phone = null,
        $session_id = null,
        $db = null
    )
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
        $this->db = $db;
    }

    function getOrdersAll()
    {
        $sql = "SELECT * FROM orders";

        echo $this->db->executeQuery($sql) . '<br>';
    }

    public function getProduct()
    {
        echo "
        <hr><b>Заказы</b><br>
        <b>Наименование:</b> {$this->name}<br>
        <b>Количество:</b> {$this->phone} шт.<br><hr>
        ";
    }


}