<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/17/2018
 * Time: 2:53 AM
 */

// Publisher
interface Subject
{
    public function attach($observable);

    public function detach($observer);

    public function notify();
}

// Subscriber
interface Observer
{
    public function handle();
}

class Login implements Subject
{
    protected $observer = [];

    /*public function attach(Observer $observer)
    {
        $this -> observer[] = $observer;
    }*/
    public function attach($observable)
    {
        if (is_array($observable)) {
            return $this -> attachObservers($observable);
        }
        $this -> observer[] = $observable;
        return $this;
    }

    public function detach($index)
    {
        unset($this -> observerp[$index]);
    }

    public function notify()
    {
        foreach ($this -> observer as $observer) {
            $observer -> handle();
        }
    }

    /**
     * @param $observable
     * @throws Exception
     */
    public function attachObservers($observable)
    {
        foreach ($observable as $observer) {
            if (!$observer instanceof Observer) {
                throw new Exception;
            }
            $this -> attach($observer);
        }
    }

    public function fire()
    {

        $this -> notify();
    }
}

class LoginHandler implements Observer
{
    public function handle()
    {
        var_dump('log sth important');
    }
}

class EmailNotifier implements Observer
{
    public function handle()
    {
        var_dump('fire off an email');
    }
}

class LoginReporter implements Observer
{
    public function handle()
    {
        var_dump('do some form of reporting');
    }
}

$login = new Login;
$login -> attach([new LoginHandler, new EmailNotifier(), new LoginReporter()]);
$login -> fire();

Event::listen('user.login', function(){

});