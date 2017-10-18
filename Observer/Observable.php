<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 11:01 PM
 */
class Observable implements QuackObservable
{
    private $observers;
    private $duck;

    public function __construct(QuackObservable $duck)
    {
        $this->duck = $duck;
    }

    public function registerObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function notifyObservers()
    {
        $iterator = new ArrayIterator($this->observers);

        while ($iterator->valid()) {
            $observer = $iterator->current();
            $observer->update($this->duck);

            $iterator->next();
        }
    }
}