<?php
namespace dinhub;

class Request {
    public static function isPost() : bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST' ? true : false;
    }

    public static function isGet() : bool {
        return $_SERVER['REQUEST_METHOD'] === 'GET' ? true : false;
    }

    public static function get(string | null $key = null, $returnThisIfNull = null) : mixed {
        if (is_null($key)) {
            return $_GET;
        }

        if (isset($_GET[$key])) {
            return $_GET[$key];
        }

        return $returnThisIfNull;
    }

    public static function post(string | null $key = null, $returnThisIfNull = null) : mixed {
        if (is_null($key)) {
            return $_POST;
        }

        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
        
        return $returnThisIfNull;
    }

    public static function getHeader(string $headerName) : mixed {
        $headers = getallheaders();
        return isset($headers[$headerName]) ? $headers[$headerName] : false;
    }

    public static function restInput(string | null $key = null) : mixed {
        $content = (array) json_decode(file_get_contents('php://input'), TRUE);
        if (!is_array($content) || empty($content)) {
            return false; // no rest input
        }

        if (is_null($key)) {
            return $content;
        }

        if (isset($content[$key])) {
            return $content[$key];
        }

        return false;
    } 
}