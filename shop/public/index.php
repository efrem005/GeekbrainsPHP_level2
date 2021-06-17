<?php

include "../config/config.php";
include "../engine/Autoload.php";

use app\models\product\{Product,Vacuum,Phone};
use app\models\{Users, News};
use app\models\backet\{Basket, Orders};
use app\engine\{Autoload};

spl_autoload_register([new Autoload(), 'loadClass']);

//insert
//$user = new Users('mr.Mi', 'admin123', '4j56h5jkgy8fibyh54ig', 0, 'Mi');
//$user->Insert();

//$product = new Product('XIAOMI Redmi Note 9 Pro', 1380949,'Redmi Note 9 Pro оснащён системой четырёх камер флагманского уровня.', 16990,  209, 8,'шт', 1);
//$product->Insert();


//delete
//$user = (new Users())->getOne(6);
//$user->delete();

//$product = (new Product())->getOne(12);
//$product->delete();


$product = (new Product())->getOne(11);
$product->getProduct();
$product->setBuyProduct(3);
$product->getProduct();




//$product = new Product('APPLE iPhone SE 2020', 1429464,'Классический компактный дизайн, мощный процессор A13 Bionic и масса других достоинств.', 36690,  148, 3, 'шт', 1);
//$phone1 = new Phone(2,'XIAOMI Redmi Note 9 Pro', 1380949,'Redmi Note 9 Pro оснащён системой четырёх камер флагманского уровня.', 16990,  209, 8,'шт', 1,'Серый','Android 10.0', 'Qualcomm Snapdragon 720G, 2300МГц, 8-ми ядерный', '6.67", IPS', '6', '128');
//$phone2 = new Phone(3,'APPLE iPhone 11', 1429419,'смартфон корпорации Apple, использующий процессор Apple A13 Bionic и операционную систему iOS 13', 57490,  194 , 11,'шт', 1, 'Черный','iPhone iOS 13', 'Apple A13 Bionic', '6.1", IPS', '4', '128');
//
//$vacuum1 = new Vacuum(4,'XIAOMI Mi Robot Vacuum Mop', 1366631,'Благодаря толщине корпуса всего 82 мм* этот пылесос с легкостью может выполнять уборку под кроватью.',16990,  '3600', 5, 'шт', 2,'сухая/влажная', 'Да', 'есть', '40', '50');
//
//$basket1 = new Basket( 'Xiaomi', 3, 12000, 'dggdfgdfhtr56467425ytrh');
//$order1 = new Orders( 'Николай', +79082205090, 'dfgdfgdfgtr6564b6u56');
//
//
//$product->getProduct();
//$product->setSaleProduct(10500);
//$product->getProduct();
//
//$phone1->getProduct();
//$phone1->setBuyProduct(1);
//$phone1->setPriceUpdate(21300);
//$phone1->getProduct();
//
//$phone2->getProduct();
//$phone2->setSaleProduct(1500);
//$phone2->setBuyProduct(4);
//$phone2->getProduct();
//
//$vacuum1->getProduct();
//$vacuum1->setBuyProduct(1);
//$vacuum1->getProduct();
//
//$phone1->getAll();
//
//$vacuum1->getOne(4);
//
//$product->getAll();
//
//$basket1->getAll();
//$basket1->getProduct();
//$basket1->getSumAll();
//
//$order1->getProduct();
//$order1->getAll();