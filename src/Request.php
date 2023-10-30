<?php
namespace dinhub;

class Request {
    private array $rest;

    public function __construct() {
        $this->rest = (array) json_decode(file_get_contents('php://input'), TRUE);
    }

    public static function isPost() : bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST' ? true : false;
    }

    public static function isGet() : bool {
        return $_SERVER['REQUEST_METHOD'] === 'GET' ? true : false;
    }

    public function rest() : array {
        return $this->rest;
    }

    public static function get(string | null $key = null, $returnIfNull = null) : mixed {
        if (is_null($key)) {
            return $_GET;
        }

        if (isset($_GET[$key])) {
            return $_GET[$key];
        }

        return $returnIfNull;
    }

    public static function post(string | null $key = null, $returnIfNull = null) : mixed {
        if (is_null($key)) {
            return $_POST;
        }

        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
        return $returnIfNull;
    }

    public static function getHeader(string $headerName) : mixed {
        $headers = getallheaders();
        return isset($headers[$headerName]) ? $headers[$headerName] : false;
    }
}