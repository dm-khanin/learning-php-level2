<?php

namespace app\models;

use \app\services\Db as Db;
abstract class Model implements IModel {
    protected $db;
    protected static $tableName;

    public function __construct() {
        $this->db = new Db();
    }

    public function getById($id) {
        $table = static ::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = {$id}";
        return (new Db())->queryOne($sql, []);
    }

    public function getAll() {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table}";
        return (new Db())->queryAll($sql, []);
    }
}