<?php
//Each class can access trait.
trait Clap{
    function clapHands(){
        echo "Everybody clap their hands.\r\n";
    }
}

interface Existance{
    function exists();
}

interface Creature{
    function walk();
}

abstract class Animal implements Existance,Creature{
    abstract function run();
}

class Person extends Animal{
    //To use trait in the class, need to use [Trait name].
    use Clap;
    private $name;
    public function setName($newName){
        $this->name=$newName;
    }
    public function getName(){
        return $this->name;
    }
    public function run(){
        echo "{$this->name} runs around the lake everyday.\r\n";
    }
    public function walk(){
        echo "{$this->name} walks around the lake everyday.\r\n";
    }
    public function exists(){
        echo "This is {$this->name}.\r\n";
    }
    public function traits(){
        //Used trait property can be called by the class.
        $this->clapHands();
    }
}

$person=new Person();
$person->setName("Adam");
$person->run();
$person->walk();
$person->exists();
$person->traits();
//Trait also can use the following way.
$person->clapHands();

?>
