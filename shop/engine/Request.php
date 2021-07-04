<?php


namespace app\engine;


use app\models\repositories\user\UsersRepositories;
use Dotenv\Dotenv;

class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $httpReferer;
    protected $dotenv;

    protected $params = [];
    protected $method;

    public function __construct()
    {
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        $url = explode('/', $this->requestString);

        $this->controllerName = $url[1];
        $this->actionName = $url[2];

        $this->dotenv = Dotenv::createImmutable(ROOT . "/data/")->load();

        $this->params = $_REQUEST;

        $data = json_decode(file_get_contents('php://input'));
        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $this->params[$key] = $value;
            }
        }

        $this->httpReferer = $_SERVER['HTTP_REFERER'];

    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {   // если есть обрашение к контроллеру adminController то мы проверяем Admin или нет
        // правельно здесь это делать или надо в другом месте
        if (strtolower($this->controllerName) == 'admin') {
            if ((new UsersRepositories())->isAdmin()) {
                return $this->controllerName;
            }
            header("Location: /error/admin");
            throw new \Exception("Вы не админ");
        }
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getHttpReferer()
    {
        return $this->httpReferer;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getEnv($name)
    {
        return $_ENV[$name];
    }

}