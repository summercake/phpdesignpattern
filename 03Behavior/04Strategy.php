<?php

/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/16/2018
 * Time: 9:43 PM
 */
interface Logger
{
    public function log($data);
}

class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a file');
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a database');
    }
}

class LogToXWebService implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a web service');
    }
}

class App
{
    public function log($data, Logger $logger)
    {
        $logger -> log($data);
    }
}

$app = new App;
$app -> log('Some info here', new LogToXWebService());
$app -> log('Some info here', new LogToDatabase());
