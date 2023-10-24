<?php 
namespace dinhub;

class SessionService {
    private string $sessionName = '__session';
    private int $expire = 3600;
    private bool $secure = false;
    private bool $httpOnly = true; 
    private string $sameSite = 'Lax';

    public function __construct() {
        $conf = require_once __DIR__ . '/../config/session.php';
        $this->sessionName = strval($conf['name']);
        $this->expire = intval($conf['expire']);
        $this->secure = boolval($conf['secure']);
        $this->httpOnly = boolval($conf['httpOnly']);
        $this->sameSite = strval($conf['samesite']);
    }

    public function load() {
        session_name($this->sessionName);
        session_set_cookie_params($this->expire, '/', '', $this->secure, $this->httpOnly);
        ini_set('session.cookie_samesite', $this->sameSite);
    }
}