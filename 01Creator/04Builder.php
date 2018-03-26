<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/26/2018
 * Time: 3:25 PM
 */

namespace app\Builder;

interface Item
{
    public function name();

    public function packing();

    public function price();
}

interface Packing
{
    public function pack();
}

class Wrapper implements Packing
{
    public function pack()
    {
        return "Wrapper\n";
    }
}

class Bottle implements Packing
{
    public function pack()
    {
        return "Bottle\n";
    }
}

abstract class Burger implements Item
{
    public function packing()
    {
        return new Wrapper();
    }

    public abstract function price();
}

abstract class ColdDrink implements Item
{
    public function packing()
    {
        // TODO: Implement packing() method.
        return new Bottle();
    }

    public abstract function price();
}

class VegBurger extends Burger
{
    public function name()
    {
        return "Veg Burger\n";
    }

    public function price()
    {
        return 25.0;
    }
}

class ChickenBurger extends Burger
{
    public function name()
    {
        return "Chicken Burger\n";
    }

    public function price()
    {
        return 50.5;
    }
}

class Coke extends ColdDrink
{
    public function name()
    {
        return "Coke\n";
    }

    public function price()
    {
        return 30.0;
    }
}

class Pepsi extends ColdDrink
{
    public function name()
    {
        return "Pepsi\n";
    }

    public function price()
    {
        return 35.0;
    }
}

class Meal
{
    private $items = [];

    public function addItem(Item $item)
    {
        array_push($this -> items, $item);
    }

    public function getCost()
    {
        $cost = 0.0;
        foreach ($this -> items as $item) {
            $cost += $item -> price();
        }
        return $cost;
    }

    public function showItems()
    {
        foreach ($this -> items as $item) {
            echo "Item : ".$item -> name();
            echo "packing : ".$item -> packing() -> pack();
            echo "price : ".$item -> price();
            echo "\n";
        }
    }
}

class MealBuilder
{
    public function prepareMeal()
    {
        $meal = new Meal();
        $meal -> addItem(new VegBurger());
        $meal -> addItem(new Coke());
        return $meal;
    }

    public function prepareNonVegMeal()
    {
        $meal = new Meal();
        $meal -> addItem(new ChickenBurger());
        $meal -> addItem(new Pepsi());
        return $meal;
    }
}

$mealBuilder = new MealBuilder();
$vegMeal = $mealBuilder -> prepareMeal();
$vegMeal -> showItems();
$nonVegMeal = $mealBuilder -> prepareNonVegMeal();
$nonVegMeal -> showItems();