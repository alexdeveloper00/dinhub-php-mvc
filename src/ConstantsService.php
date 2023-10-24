<?php 
namespace dinhub;

class ConstantsService {
    private $constants = [];
    private $loaded = false;

    public function __construct() {
        $this->constants = require_once __DIR__ . '/../config/constants.php';
        if (!empty($this->constants)) {
            $this->loaded = true;
        }
    }

    public function enable() {
        if ($this->loaded) {
            foreach ($this->constants as $i => $j) {
                if (is_array($j)) {
                    foreach ($j as $ii => $k) {
                        define($ii, $k);
                    }
                } else {
                    define($i, $j);
                }
            }
        }
    }
}