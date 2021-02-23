<?php
abstract class Person{
    public $name,$age;
    function __construct($newName,$newAge){
        $this->name=$newName;
        $this->age=$newAge;
    }
    //function none(){}
}

class Employee extends Person{
    public $salary,$position;
    function __construct($name,$age,$newSalary,$newPosition){
        parent::__construct($name,$age);
        $this->salary=$newSalary;
        $this->position=$newPosition;
    }
    //If you want to discard, reference of Objects, you can use '__destruct'(not frequently used).
    function __destruct(){
        echo "\r\nReference of Objecet was abolished.";
    }
    function saySalary(){
        echo "My salary is {$this->salary}. I wanna get more...";
    }
}

//Return Extended methods.
class InspectMethod{
    function getInheritedMethods($obj){
        $methods=get_class_methods(get_class($obj));
        if(get_parent_class($obj)){
            $parentMethods=get_class_methods(get_parent_class($obj));
            $methods=array_intersect($methods,$parentMethods);
        }
    return $methods;
    }
}
?>

<?php
$employee=new Employee("Alex",24,"\$3000","Tempolary Employee");
echo $employee->name . " ". $employee->age  . " " . $employee->salary . " " . $employee->position;
echo "\r\n";
//$doesClassExists=class_exists("Employee");
$sub="Employee";
$doesClassExists=class_exists($sub);
$classes=get_declared_classes();
$doesClassExists=in_array($doesClassExists,$classes);
echo $doesClassExists ? "true":"false";

$methods=get_class_methods($sub);

//Show each classes, methods and properties name.
foreach($classes as $class){
    echo "Class name is {$class}.\r\n";
}
$properties=get_class_vars($sub);
if(!count($methods)){
    echo "Nothing in \$method.";
}else{
    foreach($methods as $meth){
        echo "Method name is {$meth}.\r\n";
    }
}
if(!count($properties)){
    echo "Nothing in \$properties.";
}else{
    //To get properties through using 'class_vars', vars must be initialized at first as $salary="\$3000" and so on.
    foreach($properties as $props){
        echo "Property name is {$props}.\r\n";
    }
}
$methodExists=method_exists($employee,"__construct");
echo $methodExists ? "True\r\n":"False\r\n";
$getObjVar=get_object_vars($employee);
echo $getObjVar ? "True\r\n":"False\r\n";
foreach($getObjVar as $empVars){
    echo "Property value is {$empVars}.\r\n";
}

$inspMeth=new InspectMethod();
$result = $inspMeth->getInheritedMethods($employee);
foreach($result as $res){
    echo $res;
}
?>
