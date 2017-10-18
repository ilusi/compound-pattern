<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 9:57 PM
 */
class CountingDuckFactory extends AbstractDuckFactory
{
    public function createMallardDuck()
    {
        return new QuackCounter(new MallardDuck());
    }

    public function createRedHeadDuck()
    {
        return new QuackCounter(new RedHeadDuck());
    }

    public function createDuckCall()
    {
        return new QuackCounter(new DuckCall());
    }

    public function createRubberDuck()
    {
        return new QuackCounter(new RubberDuck());
    }
}