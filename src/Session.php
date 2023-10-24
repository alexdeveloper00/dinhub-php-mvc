<?php 
namespace dinhub;

class Session {
    private $sessionActive = 0;

    public function __construct() {
        if (version_compare(phpversion(), '5.4.0', '>=') ) {
            $this->sessionActive = session_status() === PHP_SESSION_ACTIVE ? 1 : 0;
        } else {
            $this->sessionActive = session_id() === '' ? 0 : 1;
        }

        if (0 === $this->sessionActive) {
            session_start();
        }
    }

    public function get(string $key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
    }

    public function has(string $key) : bool {
        return isset($_SESSION[$key]);
    }

    public function set(string $key, $value) {
        $_SESSION[$key] = $value;
    }

    public function delete(string $key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public function regenerate() {
        session_regenerate_id(true);
    }

    public function destroy() {
        $_SESSION = array();
        setcookie(session_name(), '', time() - 1, '/');
    }
}