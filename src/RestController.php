<?php
namespace dinhub;
use dinhub\Request;

class RestController {
    private Request $request;

    public function __construct() {
        $this->request = new Request();
    }

    public function json(array $data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function input(null | string $name = null) : mixed {
        $rest = $this->request->rest();

        if ($name !== null) {
            return isset($rest[$name]) ? $rest[$name] : null;
        }

        return $rest;
    }
}