<?php
namespace app\models;
use app\services\Db;

abstract class Model
{
    protected $db;

    /**
     * Product constructor.
     * @param $id
     */
    public function __construct()
    {
        // $this->db = new Db;
    }

    public static function getById($id){
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return static::getDb()->queryOne($sql, [':id' => $id]);
    }

    public static function getAll(){
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table}";
        return static::getDb()->queryAll($sql);
    }

    public static function getDb(){
        return Db::getInstance();
    }

    public static function getMaxPrice() {
        $table = static::getTableName();
        $sql = "SELECT MAX(good_price) FROM {$table}";
        return static::getDb()->queryAll($sql);//, [':id' => $id]);
    }

    abstract public function getTableName();
}