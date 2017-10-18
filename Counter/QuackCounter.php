<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 9:48 PM
 */
include '../Duck/Quackable.php';

class QuackCounter implements Quackable
{
    private $duck;
    private static $numberOfQuacks;
    private $observable;

    public function __construct(Quackable $duck)
    {
        $this->duck = $duck;
        $this->observable = new Observable($this);
    }

    public function quack()
    {
        $this->duck->quack();

        self::$numberOfQuacks++;

        $this->notifyObservers();
    }

    public static function getQuacks()
    {
        return self::$numberOfQuacks;
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