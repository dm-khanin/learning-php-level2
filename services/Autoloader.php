<?php

namespace app\services;

class Autoloader {
    protected $ext = '.php';

    public function loadClass($className) {
        $className = str_replace(['app\\', '\\'], ['', '/'], $className);
        $filename = ROOT_DIR . "{$className}{$this->ext}";
        if (file_exists($filename)) {
            include ($filename);
        }
    }
}