<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/25/2018
 * Time: 3:43 AM
 */

final class SingletonObject
{
    private static $instance = null;

    /**
     * SingletonObject constructor.
     */
    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self ::$instance ) {
            self ::$instance = new SingletonObject();
        }
        return self ::$instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function showMessage()
    {
        echo 'This is a singleton';
    }
}

$singleton = SingletonObject ::getInstance();
$singleton -> showMessage();
