<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 9:44 PM
 */
include '../Duck/Quackable.php';

class GooseAdapter implements Quackable
{
    private $goose;
    private $observable;

    public function __construct(Goose $goose)
    {
        $this->goose = $goose;
        $this->observable = new Observable($this);
    }

    public function quack()
    {
        $this->goose->honk();

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