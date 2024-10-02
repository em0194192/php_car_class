<?php
declare(strict_types=1); //enforces type controls on function parameters and return types

//Part 1: Class Definition
class Car
{
    //Properties
    public static int $id = 1;
    public string $car_make;
    public string $car_model;
    private float $car_price;
    private int $carId;

    //Constructor
    public function __construct($car_make, $car_model, $car_price)
    {
        $this->carId = self::$id; //grabs the current global $id, assigns to carId
        self::$id++; //increments the global $id value for next instantiation use
        $this->car_make = $car_make; 
        $this->car_model = $car_model;
        $this->car_price = $car_price;
    }

    //Function that sets price with +/- 10% constraints, error message on failure
    public function setPrice($newPrice)
    {
        //Determine 10% of current car_price and store in a variable
        $tenPercentCurrentPrice = $this->car_price *0.10;

        //Set variables to hold minimum and maximum allowed price (+/- 10% current price)
        $maxNewPrice = $this->car_price + $tenPercentCurrentPrice;
        $minNewPrice = $this->car_price - $tenPercentCurrentPrice;

        //Switch Statement to handle conditional price ranges
        switch(true) {
            case ($newPrice > $maxNewPrice): //When newprice is too large
                echo "Error: Price Not Changed. The new price exceeds the maximum 10% increase allowed!\n";
                break;
            case ($newPrice < $minNewPrice): //When newprice is too small
                echo "Error: Price Not Changed. The new price is below the maximum 10% decrease allowed!\n";
                break;
            default:
                $this->car_price = $newPrice; //sets the price to the input newPrice
                echo "Price successfully updated to \$$newPrice.\n";
        }
    }

    //Function that returns an array with the car's make,model, price, and carID
    public function getCar()
    {
        //Create array, populate with details from object
        $carArray = [
            "make" => $this->car_make,
            "model" => $this->car_model,
            "price" => $this->car_price,
            "carID" => $this->carId
        ];

        //return the array
        return $carArray;
    }

    //Function that returns a string with make, model, and price
    public function __toString()
    {
        return ("I am a $this->car_make $this->car_model that costs $$this->car_price");
    }
}


//Part 2 Instantiate Car Objects

//Create 2 instances of the car class
$camry = new Car("Toyota","Camry",25000.00);
$civic = new Car("Honda","Civic",22000.00);

//Store Cars in an array
$aryCars = [$camry, $civic];

//Display Car Details using toString (loop through array, echoing the objects calls toString)
foreach ($aryCars as $car) {
    echo $car . "\n";
}

//Part 3: Test Cases and Expected Outputs
//Test Case 1: Valid Price Update for Car 1
$camry->setPrice(27000.00);
//Test Case 2: Invalid Price Update for Car 1
$camry->setPrice(35000.00);
//Test Case 3: Retrieve Car Details Using getCar()
print_r($camry->getCar());
print_r($civic->getCar());