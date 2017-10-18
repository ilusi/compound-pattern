<?php

class Quackologist implements Observer
{
    public function update(QuackObservable $duck)
    {
        echo 'Quackologist: ' . get_class($duck) . 'just quacked!';
    }
}