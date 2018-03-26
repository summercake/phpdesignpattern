<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/20/2018
 * Time: 11:12 AM
 */
class ATest {

    public function say()
    {
        echo 'Segmentfault';
    }

    public function callSelf()
    {
        self::say();
    }

    public function callStatic()
    {
        static::say();
    }
}

class BTest extends ATest {
    public function say()
    {
        echo 'PHP';
    }
}

$b = new BTest();
$b->say(); // output: php
echo "\n";
$b->callSelf(); // output: segmentfault
echo "\n";
$b->callStatic(); // output: php