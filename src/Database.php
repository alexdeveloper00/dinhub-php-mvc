<?php 

namespace dinhub;
use PDO;
require_once 'NotORM.php';

class Database {
    private static $instance;
    private $orm;
    
    private function __construct(string $cName) {
        $cons = require_once __DIR__ . '/../config/db.php';
        $details = isset($cons[$cName]) ? $cons[$cName] : null;

        if (null === $details) {
            die('Cannot connect to db');
        }
        
        $appConn = new PDO($details['type'] . ':host=' . $details['host'] . ';dbname=' . $details['database'], $details['user'], $details['password']);
        $orm = new \NotORM($appConn);
        $this->orm = $orm;
    }
    
    public static function use(string $cName) {
        if (self::$instance === null) {
            self::$instance = new self($cName);
        }
        return self::$instance->orm;
    }
}