<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 10:46 PM
 */
interface QuackObservable
{
    public function registerObserver(Observer $observer);
    public function notifyObservers();
}