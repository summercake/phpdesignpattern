<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/16/2018
 * Time: 8:12 PM
 */

interface BookInterface
{
    public function open();

    public function turnPage();
}

interface eReaderInterface
{
    public function turnOn();

    public function pressNextButton();
}

class Book implements BookInterface
{
    public function open()
    {
        var_dump('opening the paper book');
    }

    public function turnPage()
    {
        var_dump('turning the page of the paper book');
    }
}

class Kindle implements eReaderInterface
{
    public function turnOn()
    {
        var_dump('turn kindle on');
    }

    public function pressNextButton()
    {
        var_dump('press the next button on the kindle');
    }
}

class Nook implements eReaderInterface
{
    public function turnOn()
    {
        var_dump('turn Nook on');
    }

    public function pressNextButton()
    {
        var_dump('press the next button on the Nook');
    }
}

class eReaderAdapter implements BookInterface
{
    private $eReader;

    /**
     * eReaderAdapter constructor.
     * @param $eReader
     */
    public function __construct(eReaderInterface $eReader){ $this -> eReader = $eReader; }

    public function open()
    {
        return $this -> eReader -> turnOn();
    }

    public function turnPage()
    {
        return $this -> eReader -> pressNextButton();
    }
}

class Person
{
    public function read(BookInterface $book)
    {
        $book -> open();
        $book -> turnPage();
    }
}

(new Person) -> read(new eReaderAdapter(new Kindle()));
(new Person) -> read(new eReaderAdapter(new Nook()));