<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/24/2018
 * Time: 8:21 PM
 */
require 'app.php';

class Bar
{
}

class Foo
{
    protected $bar;

    public function __construct(Bar $bar)
    {
        $this -> bar = $bar;
    }
}

Application ::bind('foo', function (){
    return new Foo(new Bar);
});
$foo = Application ::make('foo');
var_dump($foo);
//$app = new Application;
//var_dump($app);
