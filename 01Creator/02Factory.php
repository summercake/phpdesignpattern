<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/25/2018
 * Time: 4:28 AM
 */

namespace app\factory;

interface Shape
{
    public function draw();
}

class Rectangle implements Shape
{
    public function draw()
    {
        echo "Rectangle::draw()\n";
    }
}

class Square implements Shape
{
    public function draw()
    {
        echo "Square::draw()\n";
    }
}

class Circle implements Shape
{
    public function draw()
    {
        echo "Circle::draw()\n";
    }
}

class ShapeFactory
{
    public static function getShape($shape)
    {
        if ($shape == 'Circle') {
            return new Circle();
        }
        if ($shape == 'Rectangle') {
            return new Rectangle();
        }
        if ($shape == 'Square') {
            return new Square();
        }
        return null;
    }
}

$circle = ShapeFactory ::getShape('Circle');
$circle->draw();