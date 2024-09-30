<?php
declare(strict_types=1);
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
        
    }

}