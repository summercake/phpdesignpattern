<?php

/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/16/2018
 * Time: 7:04 PM
 */
interface CarService
{
    public function getCost();

    public function getDescription();
}

class BaseInspection implements CarService
{
    public function getCost()
    {
        return 25;
    }

    public function getDescription()
    {
        return 'Basic Inspection';
    }
}

/*class BasicInspectionAndOilChange
{
    public function getCost()
    {
        return 25 + 19;
    }
}

class BasicInspectionAndOilChangeAndTireRotation
{
    public function getCost()
    {
        return 25 + 19 + 10;
    }
}*/

class OilChange implements CarService
{
    /**
     * @var CarService
     */
    protected $carService;

    /**
     * OilChange constructor.
     * @param CarService $carService
     */
    public function __construct(CarService $carService){ $this -> carService = $carService; }

    /**
     * @return int
     */
    public function getCost()
    {
        return 29 + $this -> carService -> getCost();
    }

    public function getDescription()
    {
        return $this -> carService -> getDescription().", and oil change";
    }
}

class TireRotation implements CarService
{
    /**
     * @var CarService
     */
    protected $carService;

    /**
     * OilChange constructor.
     * @param CarService $carService
     */
    public function __construct(CarService $carService){ $this -> carService = $carService; }

    /**
     * @return int
     */
    public function getCost()
    {
        return 10 + $this -> carService -> getCost();
    }

    public function getDescription()
    {
        return $this -> carService -> getDescription().", and tire rotation";
    }
}

echo (new TireRotation(new OilChange(new BaseInspection()))) -> getCost();
echo "\n";
echo (new TireRotation(new OilChange(new BaseInspection()))) -> getDescription();
echo "\n";
echo (new TireRotation(new BaseInspection())) -> getCost();
echo "\n";
echo (new TireRotation(new BaseInspection())) -> getDescription();
