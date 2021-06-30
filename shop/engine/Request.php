<?php


namespace app\engine;


use app\models\user\Users;

class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $httpReferer;


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

        $data = json_decode(file_get_contents('php://input'));
        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $this->params[$key] = $value;
            }
        }


        $this->httpReferer = $_SERVER['HTTP_REFERER'];

        $this->params = $_REQUEST;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        if (strtolower($this->controllerName) == 'admin'){
            if (Users::isAdmin()) {
                return $this->controllerName;
            }
            header("Location: /error/admin");
            die();
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

}