<?php

//class Animal{
//    public $name;
//    public $age;
//
//    public function __construct (string $name, int $age) {
//        $this->name = $name;
//        $this->age = $age;
//    }
//    // getter method
//    public function getName() : string {
//        return $this->name;
//    }
//    public function getAge() : int {
//        return $this->age;
//    }
//    // setter method
//    public function setName(string $name) : void {
//        $this->name = $name;
//    }
//    public function setAge(int $age) : void {
//        $this->age = $age;
//    }
//}
//
//$animal = new Animal("Hamster", 2);
//
//echo $animal->getAge();
//
//$animal->setAge(3);
//
//echo "<br>";
//
//echo $animal->getAge();






class DB {
    public $pdo;
    public function __construct () {
        $dsn = 'mysql:host=127.0.0.1;dbname=work_of_tracker';
        $this->pdo = new PDO($dsn, 'root', '1234');
        return $this->pdo;
    }
}












