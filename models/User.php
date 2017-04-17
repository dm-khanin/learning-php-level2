<?php

namespace app\models;

class User extends Model {
    private $id;
    private $username = '';
    private $email = '';
    private $password = '';
    private $userData = [];
    private static $count = 0;
    public function __construct($username, $email, $pass, $data) {
        parent::__construct();
        $this->id = self::$count;
        $this->username = $username;
        $this->email = $email;
        $this->password = $pass;
        $this->userData = $data;
        self::$count++;
    }

    public function showInfo() {
        echo "<br/>username:$this->username; email:$this->email; id:$this->id; pass:$this->password<br/>";
    }

    public function getTableName() {
        return 'user';
    }

    public static function getCount() {
        return self::$count;
    }
}