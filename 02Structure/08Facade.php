<?php

/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/25/2018
 * Time: 3:14 AM
 */
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

class ShapeMaker
{
    private $circle;
    private $rectangle;
    private $square;

    public function __construct()
    {
        $this -> circle = new Circle;
        $this -> rectangle = new Rectangle;
        $this -> square = new Square;
    }

    public function drawCircle()
    {
        $this -> circle -> draw();
    }

    public function drawRectangle()
    {
        $this -> rectangle -> draw();
    }

    public function drawSquare()
    {
        $this -> square -> draw();
    }
}

$shapeMaker = new ShapeMaker();
$shapeMaker -> drawCircle();
$shapeMaker -> drawRectangle();
$shapeMaker -> drawSquare();