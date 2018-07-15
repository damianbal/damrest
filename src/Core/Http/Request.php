<?php 

namespace damrest\Core\Http;

class Request
{
    protected $params = [];
    protected $pathInfo;
    protected $method;

    public function setParams($params) 
    {
        $this->params = $params;
    }

    public function getMethod() 
    { 
        return $this->method; 
    }

    public function getPathInfo() 
    { 
        return $this->pathInfo; 
    }

    /**
     * Return param from URI
     *
     * @param [string] $key
     * @return void
     */
    public function getParam($key) { return $this->params[$key]; }

    /**
     * Get Input
     *
     * @param string $name
     * @return void
     */
    public function getRawInput($name) 
    {
        $rawData = file_get_contents('php://input');
        
        return json_decode($rawData, true)[$name];
    }

    /**
     * Return inputs
     *
     * @return array
     */
    public function getInputs()
    {
        $rawData = file_get_contents('php://input');

        return json_decode($rawData, true); 
    }

    public function input($name)
    {
        if($this->method == "GET") {
            return $_GET[$name];
        }
        else if($this->method == "POST") {
            return $_POST[$name];
        }
        else if($this->method == "PUT") {
            parse_str(file_get_contents("php://input"), $post_vars);
            return $post_vars[$name];
        }

        return "";
    }

    /**
     * Make request from $_SERVER variables
     */
    public function __construct()
    {
        $this->pathInfo = $_SERVER["PATH_INFO"];
        $this->method = $_SERVER["REQUEST_METHOD"];
    }
}