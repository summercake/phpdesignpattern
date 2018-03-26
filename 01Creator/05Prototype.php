<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/26/2018
 * Time: 3:58 PM
 */

namespace app\Prototype;

abstract class Shape
{
    private $id;
    protected $type;

    abstract function draw();

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this -> id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) : void
    {
        $this -> id = $id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this -> type;
    }

    public function __clone()
    {
        return $this;
    }
}

class Rectangle extends Shape
{
    public function __construct()
    {
        $this -> type = "Rectangle";
    }

    function draw()
    {
        echo "Retangle draw()\n";
    }
}

class Square extends Shape
{
    public function __construct()
    {
        $this -> type = "Square";
    }

    function draw()
    {
        echo "Square draw()\n";
    }
}

class Circle extends Shape
{
    public function __construct()
    {
        $this -> type = "Circle";
    }

    function draw()
    {
        echo "Circle draw()\n";
    }
}

class ShapeCache
{
    private static $shapeMap = [];

    public static function getShape($shapeId)
    {
        $cachedShape = self ::$shapeMap[$shapeId];
        return clone($cachedShape);
    }

    public static function loadCache()
    {
        $circle = new Circle();
        $circle -> setId('1');
        self ::$shapeMap[$circle -> getId()] = $circle;
        $square = new Square();
        $square -> setId('2');
        self ::$shapeMap[$square -> getId()] = $square;
        $rectangle = new Rectangle();
        $rectangle -> setId('3');
        self ::$shapeMap[$rectangle -> getId()] = $rectangle;
    }
}

ShapeCache ::loadCache();
$clonedCircle = ShapeCache ::getShape('1');
$clonedSquare = ShapeCache ::getShape('2');
$clonedRectangle = ShapeCache ::getShape('3');
echo "Shape Type : ".$clonedCircle -> getType();
echo "\n";
echo "Shape Type : ".$clonedSquare -> getType();
echo "\n";
echo "Shape Type : ".$clonedRectangle -> getType();
