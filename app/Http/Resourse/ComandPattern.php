<?php

namespace App\Http\Middleware;

use Closure;


//Этот файлик просто как пример!

class ComandPattern
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }

    interface Command
    {
        public function execute();
    }

    /**
     * Some commands can implement simple operations on their own.
     */
    class SimpleCommand implements Command
    {
        private $payload;

        public function __construct($payload)
        {
            $this->payload = $payload;
        }

        public function execute()
        {
            print("SimpleCommand: See, I can do simple things like printing (".$this->payload.")\n");
        }
    }

    /**
     * However, some commands can delegate more complex operations to other objects,
     * called "receivers."
     */
    class ComplexCommand implements Command
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

    /**
     * The Receiver classes contain some important business logic. They know how to
     * perform all kinds of operations, associated with carrying out a request. In
     * fact, any class may serve as a Receiver.
     */
    class Receiver
    {
        public function doSomething($a)
        {
            print("Receiver: Working on (".$a.".)\n");
        }

        public function doSomethingElse($b)
        {
            print("Receiver: Also working on (".$b.".)\n");
        }
    }

    /**
     * The Invoker is associated with one or several commands. It sends a request to
     * the command.
     */
    class Invoker
    {
        /**
         * @var Command
         */
        private $onStart;

        /**
         * @var Command
         */
        private $onFinish;

        /**
         * Initialize commands.
         *
         * @param Command $command
         */
        public function setOnStart(Command $command)
        {
            $this->onStart = $command;
        }

        public function setOnFinish(Command $command)
        {
            $this->onFinish = $command;
        }

        /**
         * The Invoker does not depend on concrete command or receiver classes. The
         * Invoker passes a request to a receiver indirectly, by executing a
         * command.
         */
        public function doSomethingImportant()
        {
            print("Invoker: Does anybody want something done before I begin?\n");
            if ($this->onStart instanceof Command) {
                $this->onStart->execute();
            }

            print("Invoker: ...doing something really important...\n");

            print("Invoker: Does anybody want something done after I finish?\n");
            if ($this->onFinish instanceof Command) {
                $this->onFinish->execute();
            }
        }
    }
}
