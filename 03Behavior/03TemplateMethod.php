<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/16/2018
 * Time: 9:21 PM
 */

abstract class Sub
{
    public function make()
    {
        return $this -> layBread()
                     -> addLettuce()
                     -> addPrimaryTopping()
                     -> addSauces();
    }

    public function layBread()
    {
        var_dump('laying down the bread');
        return $this;
    }

    public function addLettuce()
    {
        var_dump('add some lettuce');
        return $this;
    }

    public function addSauces()
    {
        var_dump('add some sauces');
        return $this;
    }

    private function addViggies()
    {
        var_dump('add some veggies');
        return $this;
    }

    protected abstract function addPrimaryTopping();
}

class TurkeySub extends Sub
{
    function addPrimaryTopping()
    {
        var_dump('add some turkey');
        return $this;
    }
}

class VeggieSub extends Sub
{
    function addPrimaryTopping()
    {
        var_dump('add some veggies');
        return $this;
    }
}

(new TurkeySub()) -> make();
(new VeggieSub()) -> make();