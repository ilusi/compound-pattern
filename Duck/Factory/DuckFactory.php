<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 9:56 PM
 */
class DuckFactory extends AbstractDuckFactory
{
    public function createMallardDuck()
    {
        return new MallardDuck();
    }

    public function createRedHeadDuck()
    {
        return new RedHeadDuck();
    }

    public function createDuckCall()
    {
        return new DuckCall();
    }

    public function createRubberDuck()
    {
        return new RubberDuck();
    }
}