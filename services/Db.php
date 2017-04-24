<?php

namespace app\services;
use app\traits\TSingleton;

class Db
{
    use TSingleton;

    protected $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => 'Ld3452jP',
        'database' => 'phplevel2'
    ];

    /** @var  \PDO */
    public $conn;

    //public static $instance = null;

    /**
     * Db constructor.
     * @param array $config
     */
    /*   public function __construct($driver, $host, $login, $password, $database)
       {
           $this->config['driver'] = $driver;
           $this->config['host'] = $host;
           $this->config['login'] = $login;
           $this->config['password'] = $password;
           $this->config['database'] = $database;
       }*/
    public function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDnsString(),
                $this->config['login'],
                $this->config['password']
            );
        }

        $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }

    public function query($sql, $params)
    {
        $PDOStatement = $this->getConnection()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }

    public function queryOne($sql, $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll($sql, $params = [])
    {
        $smtp = $this->query($sql, $params);
        return $smtp->fetchAll();
    }

    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    protected function prepareDnsString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=UTF8",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database']
        );
    }
}