<?php

class Product {
    private $id;
    private $name;
    private $code;
    private $measure;
    private $price = 0;
    private static $productsAndServicesCount = 0;
    public function __construct($name, $price, $code, $measure) {
        $this->id = self::$productsAndServicesCount;
        $this->name = $name;
        $this->price = $price;
        $this->code = $code;
        $this->measure = $measure;
        self::$productsAndServicesCount++;
    }

    public function showInfo() {
        echo "name:$this->name; price:$this->price; id:$this->id; code:$this->code; measure:$this->measure";
    }

    public static function getProductsAndServicesCount() {
        return self::$productsAndServicesCount;
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
}

$item = new Product('mycoolname', 25, 'aabbcc', 'litre');
$item->showInfo();
echo '<br/>';

class Service extends Product {
    private $duration = 0;
    private $complexity = 0;
    public function __construct($name, $price, $code, $measure, $dur, $cmplx) {
        parent::__construct($name, $price, $code, $measure);
        $this->duration = $dur;
        $this->complexity = $cmplx;
    }

    public function showInfo() {
        parent::showInfo();
        echo "; duration:$this->duration; complexity:$this->complexity";
    }
}

$service = new Service('cleaning', 750, 'qwerty', 'hour', 1, 5);

$service->showInfo();
echo '<br/>total:' . Service::getProductsAndServicesCount();

//----------------------------------------------------------------------------------------------------------
echo '<br/>';
/*
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); //1
$a2->foo(); //2
$a1->foo(); //3
$a2->foo(); //4
//статическая переменная одна на все экземпляры класса, она увеличивается всегда при вызове foo() любого экземпляра класса A
*/


class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2
//у каждого класса своя статическая переменная $x, потому что она объявляется в функции
//чтобы исправить это, нужно написать
//class A {
//    static $x = 0;
//
//    public function foo() {
//        echo ++self::$x;
//    }
//}