<?php

namespace App\Http\Resourse;

/**
 * However, some commands can delegate more complex operations to other objects,
 * called "receivers."
*/
class ComplexCommand implements CommandPatternInterface
{
    /**
     * @var Receiver
     */
    private $receiver;

    /**
     * Context data, required for launching the receiver's methods.
     */
    private $a;

    private $b;

/**
 * Complex commands can accept one or several receiver objects along with
 * any context data via the constructor.
 */
    public function __construct(Receiver $receiver, $a, $b)
    {
        $this->receiver = $receiver;
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * Commands can delegate to any methods of a receiver.
     */
    public function execute()
    {
        print("ComplexCommand: Complex stuff should be done by a receiver object.\n");
        $this->receiver->doSomething($this->a);
        $this->receiver->doSomethingElse($this->b);
    }
}
