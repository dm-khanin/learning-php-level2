<?php

namespace app\models;

class Product extends Model {
    private $id;
    private $name = '';
    private $code = '';
    private $measure = '';
    private $price = 0;
    private static $count = 0;
    public function __construct($name, $price, $code, $measure) {
        parent::__construct();
        $this->id = self::$count;
        $this->name = $name;
        $this->price = $price;
        $this->code = $code;
        $this->measure = $measure;
        self::$count++;
    }

    public function showInfo() {
        echo "<br/>name:$this->name; price:$this->price; id:$this->id; code:$this->code; measure:$this->measure<br/>";
    }

    public function change(...$args) {
        switch (func_num_args()) {  //TODO на скорую руку сойдет, потом можно функцию запилить
            case 0:
                return;

            case 1:
                $val = func_get_args()[0];
                if (gettype($val) == 'double' || gettype($val) == 'integer') {
                    $this->price = $val;
                } elseif (gettype($val) == 'string') {
                    $this->name = $val;
                }
                break;

            case 2:
                $val = func_get_args()[0];
                $val2 = func_get_args()[1];
                if (gettype($val) == 'double' || gettype($val) == 'integer') {
                    $this->price = $val;
                    if (gettype($val2) == 'string') {
                        $this->name = $val2;
                    }
                } elseif (gettype($val) == 'string') {
                    $this->name = $val;
                    if (gettype($val2) == 'double' || gettype($val2) == 'integer') {
                        $this->price = $val2;
                    }
                }
                break;

            default:
                echo "<br/>no more data to edit supported yet";
        }
    }

    public function getTableName() {
        return 'product';
    }

    public static function getCount() {
        return self::$count;
    }
}