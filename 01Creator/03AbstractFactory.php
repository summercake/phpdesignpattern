<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/25/2018
 * Time: 4:49 AM
 */

namespace app\abstractFactory;

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

interface Color
{
    function fill();
}

class Red implements Color
{
    function fill()
    {
        echo "Red Color\n";
    }
}

class Green implements Color
{
    function fill()
    {
        echo "Green Color\n";
    }
}

class Blue implements Color
{
    function fill()
    {
        echo "Blue Color\n";
    }
}

abstract class AbstractFactory
{
    abstract function getColor($color);

    abstract function getShape($shape);
}

class ShapeFactory extends AbstractFactory
{
    public function getShape($shape)
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

    function getColor($color)
    {
        return null;
    }
}

class ColorFactory extends AbstractFactory
{
    function getShape($shape)
    {
        return null;
    }

    public function getColor($color)
    {
        if ($color == 'Red') {
            return new Red();
        }
        if ($color == 'Green') {
            return new Green();
        }
        if ($color == 'Blue') {
            return new Blue();
        }
        return null;
    }
}

class FactoryProducer
{
    public static function getFactoryInstance($instance)
    {
        if ($instance == 'Shape') {
            return new ShapeFactory();
        } else {
            if ($instance == 'Color') {
                return new ColorFactory();
            }
        }
        return null;
    }
}

$shapeFactory = FactoryProducer ::getFactoryInstance('Shape');
$shape = $shapeFactory -> getShape('Circle');
$shape -> draw();
$colorFactory = FactoryProducer ::getFactoryInstance('Color');
$color = $colorFactory -> getColor('Red');
$color -> fill();
