<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/17/2018
 * Time: 1:28 AM
 */

abstract class HomeChecker
{
    protected $successor;

    public abstract function check(HomeStatus $home);

    public function succeedWith(HomeChecker $successor)
    {
        $this -> successor = $successor;
    }

    public function next(HomeStatus $home)
    {
        $this -> successor -> check($home);
    }
}

class Locks extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home -> locked) {
            throw new Exception('The doors are not locked!!! Abort, abort');
        }
        $this -> successor -> check($home);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home -> lightOff) {
            throw new Exception('The light are powered on!!! Abort, abort');
        }
        $this -> successor -> check($home);
    }
}

class Alarm extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home -> alarmOn) {
            throw new Exception('The alarm has not been set!!! Abort, abort');
        }
        $this -> next($home);
    }
}

class HomeStatus
{
    public $alarmOn = true;
    public $locked = true;
    public $lightOff = true;
}

$locks = new Locks;
$lights = new Lights();
$alarm = new Alarm();
//
$locks -> succeedWith($lights);
$lights -> succeedWith($alarm);
//
$locks -> check(new HomeStatus());