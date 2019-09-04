<?php
/**
 * Класс основной для животных
 */
abstract class animal{
    // Статическая переменая для хранения ключа
    static $id = 1;
    // номер животного
    public $idAnimal=0;
    // сколько дает
    public abstract function getProduct();
    // вернуть
    public function getNameOfClass()
    {
        return static::class;
    }
}

/**
 * Класс курица
 */
class chicken extends animal{
    // коснтруктор класса, задаем уникальный номер
    function __construct() {
        // Задаем уникальный номер
        $this->idAnimal=parent::$id++;
        //Задаем уникальный номер
        // print "chicken id-".$this->idAnimal." \n";
    }
    // сколько может дать яйца курица
    public function getProduct(){
        return rand(0,1);
    }

}

/**
 * Класс корова
 */
class cow extends animal{
    // коснтруктор класса, задаем уникальный номер
    function __construct() {
        // задаем номер уникальный
        $this->idAnimal=parent::$id++;
        // print "Конструктор класса cow". $this->idAnimal." \n";
    }

    // сколько может дать корова молоко
    public function getProduct(){
        return rand(8, 12);
    }
}

/**
 * Создание животных (Паттерн - Абстрактная фабрика)
 */
class ConcreteFactory
{
    // Регистриурем курицу
    public function createСhicken(): chicken
    {
        return new chicken;
    }
    // Регистрируем корову
    public function createCow(): cow
    {
        return new cow;
    }
}


// Абстрактная фабрика для регистрации животных
$factory=new ConcreteFactory();
// Хлев (где все животные )
$a = array();
// регистрируем 10 коров
for($i=1;$i<=10;$i++){
    $a[]=$factory->createCow();
}
// регистрируем 20 кур
for($i=1;$i<=20;$i++){
    $a[]=$factory->createСhicken();
}

// обнуляем корзину
$milk=0;
$egg=0;
// обходим и собераем продукцию
foreach ($a as $value){
    // в зависемости от животного слаживаем проудкцию
    switch ($value->getNameOfClass()) {
        case "cow":
            $milk +=$value->getProduct();
            break;
        case "chicken":
            $egg +=$value->getProduct();
            break;
    }
    //echo $value->getProduct();
}
echo "Milk-".$milk."\n";
echo "Egg-".$egg."\n";
