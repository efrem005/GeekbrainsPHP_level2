<?php


namespace app\engine;


use app\controller\IndexController;
use app\models\repositories\backet\BasketRepositories;
use app\models\repositories\news\NewsRepositories;
use app\models\repositories\orders\OrdersRepositories;
use app\models\repositories\product\ProductRepositories;
use app\models\repositories\reviews\ReviewsRepositories;
use app\models\repositories\user\UsersRepositories;
use app\traits\TSinletone;

/**
 * Class App
 * @property Request $request
 * @property Db $db
 * @property Session $session
 * @property BasketRepositories $basketRepositories
 * @property NewsRepositories $newsRepositories
 * @property OrdersRepositories $ordersRepositories
 * @property ProductRepositories $productRepositories
 * @property ReviewsRepositories $reviewsRepositories
 * @property UsersRepositories $usersRepositories
 */
class App
{
    use TSinletone;

    public $config;
    private $components;

    private $controller;
    private $action;

    public function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'index';
        $this->action = $this->request->getActionName();

        $controllerClass = $this->config['CONTROLLER_DIR'] . ucfirst($this->controller) . 'Controller';

        if (class_exists($controllerClass)) {
            (new $controllerClass(new Render()))->runAction($this->action);
        } else {
            (new IndexController(new Render()))->error();
        }
    }

    public static function call(): App
    {
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    /**
     * @throws \ReflectionException
     */
    public function createComponent($name): object
    {
        if (isset($this->config['components'][$name])){
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)){
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }

}