<?php
declare(strict_types=1);
$n = "\n------";

class MenuItem{
    public $name;
    public $cost;
    public $ingredients;

    public function __construct(string $name,float $cost,array $ingredients){
        $this->name = $name;
        $this->cost = $cost;
        $this->ingredients = $ingredients;
    }
}

class Menu {
    public $menu;

    public function __construct(array $items){
        foreach ($items as $item){
            $this->menu[] = $item;
        }
    }

    public function get_items():string{
        $menuString = "";
        foreach ($this->menu as $item){
            $menuString .= $item->name."/";
        }
        return substr($menuString,0,strlen($menuString)-1);
    }

    public function find_drink(string $order_name){
        foreach ($this->menu as $drink){
            if($drink->name==$order_name)
                return $drink;
        }
        return null;
    }
}

class CoffeeMaker {
    public $water;
    public $coffee;

    public function __construct(int $water,int $coffee)
    {
        $this->water = $water;
        $this->coffee = $coffee;
    }

    public function report():string{
        return "\nWater: ".$this->water." ml"."\nCoffee: ".$this->coffee." ml\n";
    }

    public function is_resource_sufficient(MenuItem $drink):bool{
        if($this->water<$drink->ingredients["water"]){
            echo "Not enough water";
            return false;
        }
        if($this->coffee<$drink->ingredients["coffee"]){
            echo "Not enough coffee";
            return false;
        }
        return true;
    }

    public function make_coffee(MenuItem $drink,float $cost,MoneyMachine $machine){
        $this->water -= $drink->ingredients["water"];
        $this->coffee -= $drink->ingredients["coffee"];
        $machine->profit += $cost;
    }
}

class MoneyMachine{
    public $profit;

    public function __construct(){
        $this->profit = 0;
    }

    public function report():string{
        return "Money: ".$this->profit."$";
    }

    public function make_payment(float $money,float $cost,float $change):bool{
        if($money>=$cost){
            echo "Payment accepted\n";
            if($money > $cost) {
                $change = $money - $cost;
                echo "Here is {$change} dollars in change";
            }
            return true;
        }
        else echo "Sorry that's not enough money. Money refunded\n";
        return false;
    }
}

$drink1 = new MenuItem("latte",10,["water"=>100,"coffee"=>10]);
$drink2 = new MenuItem("espresso",20,["water"=>150,"coffee"=>20]);
$drink3 = new MenuItem("cappuccino",15,["water"=>120,"coffee"=>15]);

$menu = new Menu([$drink1,$drink2,$drink3]);
$coffeeMaker = new CoffeeMaker(1000,500);
$coffeeCanBeMade = false;
$machine = new MoneyMachine();
$change = 0;

$run = true;
while($run){
    $drink = readline("What would you like? {$menu->get_items()}}: ");

    if($drink=="off") break;

    $drink = $menu->find_drink($drink);

    if($drink){
        if($coffeeMaker->is_resource_sufficient($drink)){
            $coffeeCanBeMade = true;
        }
    }else
        echo "Sorry we don't have such drink yet\n";

    if($coffeeCanBeMade) {
        $money = (float)readline("Enter your money: ");

        if($machine->make_payment($money,$drink->cost,$change)){
            echo "{$n}\nReport before making coffee: ".$coffeeMaker->report();
            if($machine->profit>0) echo $machine->report();

            $coffeeMaker->make_coffee($drink,$drink->cost,$machine);

            echo "{$n}\nReport after making coffee: ".$coffeeMaker->report();
            if($machine->profit>0) echo $machine->report();

            echo "{$n}\nHere is your {$drink->name}. Enjoy!\n";
        }
    }
}