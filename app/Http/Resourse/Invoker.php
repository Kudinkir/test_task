<?php

namespace App\Http\Resourse;
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
    public function setOnStart(CommandPatternInterface $command)
    {
        $this->onStart = $command;
    }

    public function setOnFinish(CommandPatternInterface $command)
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
        #print("Invoker: Does anybody want something done before I begin?\n");
        if ($this->onStart instanceof CommandPatternInterface) {
            $this->onStart->execute();
        }

        #print("Invoker: ...doing something really important...\n");

       # print("Invoker: Does anybody want something done after I finish?\n");
        if ($this->onFinish instanceof CommandPatternInterface) {
            $this->onFinish->execute();
        }
    }
}