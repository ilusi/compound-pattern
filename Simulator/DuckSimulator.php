<?php
/**
 * Created by PhpStorm.
 * User: csalim
 * Date: 3/17/17
 * Time: 1:41 AM
 */
spl_autoload_register(function ($class_name) {
    include 'Duck/' . $class_name . '.php';
    include 'Duck/Factory/' . $class_name . '.php';
    include 'Goose/' . $class_name . '.php';
    include 'Counter/' . $class_name . '.php';
    include 'Flock/' . $class_name . '.php';
    include 'Observer/' . $class_name . '.php';
});

class DuckSimulator
{
    public static function test()
    {
        $simulator = new self();
        $duckFactory = new CountingDuckFactory();
        $simulator->run($duckFactory);
    }

    public function run(AbstractDuckFactory $duckFactory)
    {
        // Without Factory.
//        $mallardDuck = new QuackCounter(new MallardDuck());
//        $redHeadDuck = new QuackCounter(new RedHeadDuck());
//        $duckCall = new QuackCounter(new DuckCall());
//        $rubberDuck = new QuackCounter(new RubberDuck());
//        $gooseDuck = new GooseAdapter(new Goose());

        // With Factory.
        $mallardDuck = $duckFactory->createMallardDuck();
        $redHeadDuck = $duckFactory->createRedHeadDuck();
        $duckCall = $duckFactory->createDuckCall();
        $rubberDuck = $duckFactory->createRubberDuck();
        $gooseDuck = new GooseAdapter(new Goose());

        echo '<strong>Duck Simulator</strong><br /><br/>';

        // With Composite.
        $flockOfDucks = new Flock();
        $flockOfDucks->add($redHeadDuck);
        $flockOfDucks->add($duckCall);
        $flockOfDucks->add($rubberDuck);
        $flockOfDucks->add($gooseDuck);

        $flockOfMallards = new Flock();
        $mallard1 = $duckFactory->createMallardDuck();
        $mallard2 = $duckFactory->createMallardDuck();
        $mallard3 = $duckFactory->createMallardDuck();
        $mallard4 = $duckFactory->createMallardDuck();
        $flockOfMallards->add($mallard1);
        $flockOfMallards->add($mallard2);
        $flockOfMallards->add($mallard3);
        $flockOfMallards->add($mallard4);

        $flockOfDucks->add($flockOfMallards);

        echo '<br /><br /><strong>Duck Simulator: With Observer</strong><br /><br/>';
        $quackologist = new Quackologist();

        $mallardDuck->registerObserver($quackologist);

        $this->simulate($mallardDuck);
//        $this->simulate($redHeadDuck);
//        $this->simulate($duckCall);
//        $this->simulate($rubberDuck);
//        $this->simulate($gooseDuck);

//        $flockOfDucks->registerObserver($quackologist);
//        $flockOfMallards->registerObserver($quackologist);
//
//        $this->simulate($flockOfDucks);
//        $this->simulate($flockOfMallards);

        $this->displayNumberOfQuacks();
    }

    public function simulate(Quackable $duck)
    {
        echo '<br />' . $duck->quack() . '<br />';
    }

    public function displayNumberOfQuacks()
    {
        echo "\n" . 'The ducks quacked ' . QuackCounter::getQuacks() . ' times' . "\n";
    }
}
