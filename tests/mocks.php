<?php

class Hm_Mock_Session {

    public $loaded = false;
    public $data = array();

    public function get($id, $default) {
        if ($id == 'saved_pages') {
            return array('foo' => array('bar', false));
        }
        elseif (array_key_exists($id, $this->data)) {
            return $this->data[$id];
        }
        return $default;
    }
    public function set($name, $value) {
        $this->data[$name] = $value;
    }
    public function build_fingerprint($request, $site_key) {
        return 'fakefingerprint';
    }
    public function is_active() {
        return true;
    }
}
class Hm_Mock_Config {

    public $data = array();

    public function get($id, $default) {
        if ($id == 'user_settings_dir') {
            return './data';
        }
        elseif ($id == 'default_language') {
            return 'es';
        }
        elseif (array_key_exists($id, $this->data)) {
            return $this->data[$id];
        }
        return $default;
    }
    public function set($name, $value) {
        $this->data[$name] = $value;
    }
}

class Hm_Mock_Request {

    public $type;

    public function __construct($type) {
        $this->type = $type;
    }
    public $post = array('hm_nonce' => 'asdf', 'fld1' => '0', 'fld2' => '1');
}

function setup_db($config) {
    $config->set('db_driver', 'mysql');
    $config->set('db_host', '127.0.0.1');
    $config->set('db_name', 'test');
    $config->set('db_user', 'test');
    $config->set('db_pass', '123456');
}
function flatten($str) {
    return strtolower(str_replace(array("\n", "\t", "\r", " "), '', $str));
}

?>