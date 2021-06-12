<?php

// Класс продукты
class Product {

    public $name; // Наименование
    public $description; // Описание товара
    public $price; // Цена
    public $article; // Код товара
    public $weight; // Вес
    public $count; // Остаток на складе

    public function __construct(
        $name = 'Без названия',
        $description = 'Без описания',
        $price = 0,
        $article = 0,
        $weight = 0,
        $count = 0
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->article = $article;
        $this->weight = $weight;
        $this->count = $count;
    }

    // Изменение цены
    public function setPriceUpdate($price){
        $this->price = $price;
        echo "Изменилась цена на {$this->name} на цену {$price} Руб.<br><hr>";
    }

    // Купить
    public function setBuyProduct($count)
    {
        $this->count -= $count;
        echo "Вы купили {$this->name} в количестве {$count} шт.<br><hr>";
    }

    // Скидка
    public function setSaleProduct($price)
    {
        $this->price -= $price;
    }

    public function getProduct()
    {
        echo "
        <b>Код товара:</b> {$this->article}<br>
        <b>Наименование:</b> {$this->name}<br>
        <b>Описание товара:</b> {$this->description}<br>
        <b>Вес:</b> {$this->weight} г.<br>
        <b>Цена:</b> {$this->price} Руб.<br>
        <b>Остаток:</b> {$this->count} шт.<br><hr>
        ";
    }
}

// Класс Телефоны
class Phone extends Product {
    public $color; // Цвет
    public $system; // Операционная система
    public $processor; // Процессор
    public $display; // Дисплей
    public $ram; // Объем оперативной памяти
    public $rom; // Объем встроенной памяти

    public function __construct(
        $name = 'Без названия',
        $description = 'Без описания',
        $price = 0,
        $article = 0,
        $weight = 0,
        $count = 0,
        $color = null,
        $system = 'не указан',
        $processor = 'не указан',
        $display = 'не указан',
        $ram = 0,
        $rom = 0
    )
    {
        parent::__construct($name, $description, $price, $article, $weight, $count);
        $this->color = $color;
        $this->system = $system;
        $this->processor = $processor;
        $this->display = $display;
        $this->ram = $ram;
        $this->rom = $rom;
    }

    public function getProduct()
    {
        echo "
        <b>Код товара:</b> {$this->article}<br>
        <b>Наименование:</b> {$this->name}<br>
        <b>Описание товара:</b> {$this->description}<br>
        <b>Цвет:</b> {$this->color}<br>
        <b>Дисплей:</b> {$this->display}<br>
        <b>Операционная система:</b> {$this->system}<br>
        <b>Процессор:</b> {$this->processor}<br>
        <b>Объем оперативной памяти:</b> {$this->ram} гб<br>
        <b>Объем встроенной памяти:</b> {$this->rom} гб<br>
        <b>Вес:</b> {$this->weight} г<br>
        <b>Цена:</b> {$this->price} Руб.<br>
        <b>Остаток:</b> {$this->count} шт.<br><hr>
        ";
    }
}

// Класс Пылесосы
class Vacuum extends Product {
    public $cleaning; //Тип уборки
    public $aquafilter; //Аквафильтр
    public $brushes; // Щетка
    public $power; // Мощность
    public $noise; // Уровень шума

    public function __construct(
        $name = 'Без названия',
        $description = 'Без описания',
        $price = 0,
        $article = 0,
        $weight = 0,
        $count = 0,
        $cleaning = 'не указан',
        $aquafilter = 'не указан',
        $brushes = 'не указан',
        $power = 0,
        $noise = 0
    )
    {
        parent::__construct($name, $description, $price, $article, $weight, $count);
        $this->cleaning = $cleaning;
        $this->aquafilter = $aquafilter;
        $this->brushes = $brushes;
        $this->power = $power;
        $this->noise = $noise;
    }

    public function getProduct()
    {
        echo "
        <b>Код товара:</b> {$this->article}<br>
        <b>Наименование:</b> {$this->name}<br>
        <b>Описание товара:</b> {$this->description}<br>
        <b>Тип уборки:</b> {$this->cleaning}<br>
        <b>Аквафильтр:</b> {$this->aquafilter}<br>
        <b>Щетка:</b> {$this->brushes}<br>
        <b>Мощность:</b> {$this->power} Ватт<br>
        <b>Уровень шума:</b> {$this->noise} дб<br>
        <b>Вес:</b> {$this->weight} г<br>
        <b>Цена:</b> {$this->price} Руб.<br>
        <b>Остаток:</b> {$this->count} шт.<br><hr>
        ";
    }
}





$product = new Product('APPLE iPhone SE 2020', 'Классический компактный дизайн, мощный процессор A13 Bionic и масса других достоинств.', 36690, 1429464, 148, 3);
$phone1 = new Phone('XIAOMI Redmi Note 9 Pro', 'Redmi Note 9 Pro оснащён системой четырёх камер флагманского уровня.', 16990, 1380949, 209, 8,'Серый', 'Android 10.0', 'Qualcomm Snapdragon 720G, 2300МГц, 8-ми ядерный', '6.67", IPS', '6', '128');
$phone2 = new Phone('APPLE iPhone 11', 'смартфон корпорации Apple, использующий процессор Apple A13 Bionic и операционную систему iOS 13', 57490, 1429419, 194 , 11,'Черный', 'iPhone iOS 13', 'Apple A13 Bionic', '6.1", IPS', '4', '128');

$vacuum1 = new Vacuum('XIAOMI Mi Robot Vacuum Mop', 'Благодаря толщине корпуса всего 82 мм* этот пылесос с легкостью может выполнять уборку под кроватью.','16990', '1366631', '3600', 5, 'сухая/влажная', 'Да', 'есть', '40', '50');


$product->getProduct();
$product->setSaleProduct(10500);
$product->getProduct();

$phone1->getProduct();
$phone1->setBuyProduct(1);
$phone1->setPriceUpdate(21300);
$phone1->getProduct();

$phone2->getProduct();
$phone2->setSaleProduct(1500);
$phone2->setBuyProduct(4);
$phone2->getProduct();

$vacuum1->getProduct();
$vacuum1->setBuyProduct(1);
$vacuum1->getProduct();