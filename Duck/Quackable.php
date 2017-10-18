<?php

include 'Observer/QuackObservable.php';

interface Quackable extends QuackObservable
{
    public function quack();
}