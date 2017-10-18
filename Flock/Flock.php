<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 10:04 PM
 */
class Flock implements Quackable
{
    private $quackers;
    private $observable;

    public function __construct()
    {
        $this->observable = new Observable($this);
    }

    public function add(Quackable $quacker)
    {
        $this->quackers[] = $quacker;
    }

    public function quack()
    {
        $iterator = new ArrayIterator($this->quackers);

        while($iterator->valid()) {
            $quacker = $iterator->current();
            $quacker->quack();

            $iterator->next();
        }

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