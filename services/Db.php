<?php

namespace app\services;

class Db {
    protected $db;
    public function __construct() {
        $this->db = 'db';
    }

    public function queryOne($sql, $params = []) {
        return [];
    }

    public function queryAll($sql, $params = []) {
        return [];
    }

    public function execute($sql, $params = []) {
        return 'request executed';
    }
}