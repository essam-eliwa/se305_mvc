<?php


/**
 * In PHP 7, a new feature, Return type declarations has been introduced. 
 * Return type declaration specifies the type of value that a function should return. 
 * Following types for return types can be declared.
 */

/**
 * The base Component interface defines operations that can be altered by
 * decorators.
 */

interface Beverage
{
    public function cost(): float;
    public function description(): string;
}

/**
 * Concrete Components provide default implementations of the operations. There
 * might be several variations of these classes.
 */
class DarkRoast implements Beverage
{
    private $price = 10.5;
    public function cost(): float
    {
        return $this->price;
    }
    public function description(): string
    {
        return '<br><b>Dark roast coffee</b>' . $this->price;
    }
}

/**
 * The base Decorator class follows the same interface as the other components.
 * The primary purpose of this class is to define the wrapping interface for all
 * concrete decorators. The default implementation of the wrapping code might
 * include a field for storing a wrapped component and the means to initialize
 * it.
 */
abstract class Decorator implements Beverage
{
    protected $beverage;

    public function __construct(Beverage $beverage)
    {
        $this->beverage = $beverage;
    }
}
/**
 * The Decorator delegates all work to the wrapped component.
 */

/**
 * Concrete Decorators call the wrapped object and alter its result in some way.
 */
class Milk extends Decorator
{
    private $price = 1.1;
    /**
     * Decorators may call parent implementation of the operation, instead of
     * calling the wrapped object directly. This approach simplifies extension
     * of decorator classes.
     */
    public function cost(): float
    {
        return $this->beverage->cost() + $this->price;
    }

    public function description(): string
    {
        return $this->beverage->description() . ' <br> -  Milk: ' . $this->price;
    }
}

/**
 * Decorators can execute their behavior either before or after the call to a
 * wrapped object.
 */
class Chocolate extends Decorator
{
    private $price = 2.2;
    public function cost(): float
    {
        return $this->beverage->cost() + $this->price;
    }

    public function description(): string
    {
        return $this->beverage->description() . ' <br> - Chocolate : ' . $this->price;
    }
}

/**
 * The client code works with all objects using the Component interface. This
 * way it can stay independent of the concrete classes of components it works
 * with.
 */

/**
 * This way the client code can support both simple components...
 */
$droast = new DarkRoast();
echo "Client: I've got a cup of DarkRoast coffee:<br>";
echo $droast->description() . '<br>';
echo "Total Cost: " . $droast->cost();
echo "<br><br>";

/**
 * ...as well as decorated ones.
 *
 * Note how decorators can wrap not only simple components but the other
 * decorators as well.
 */
$decorator1 = new Milk($droast);
$decorator2 = new Chocolate($decorator1);
echo "Client: Now I've got a Dark Roast with milk and chocolate:<br>";
echo $decorator2->description() . '.<br>';
echo "Total Cost: " . $decorator2->cost();
echo "<br><br>";


$drink = new Milk($droast);
echo "Client: Now I've got a Dark Roast with milk only:<br>";
echo $drink->description() . '.<br>';
echo "Total Cost: " . $drink->cost();
