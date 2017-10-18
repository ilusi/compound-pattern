<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 1:38 AM
 */
class DuckCall implements Quackable
{
    private $observable;

    public function __construct()
    {
        $this->observable = new Observable($this);
    }

    public function quack()
    {
        echo 'Kwak!';

        $this->notifyObservers();
    }

    public function registerObserver(Observer $observer)
    {
        $this->observable->registerObserver($observer);
    }

    public function notifyObservers()
    {
        $this->observable->notifyObservers();
    }
}