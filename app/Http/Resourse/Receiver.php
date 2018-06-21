<?php

namespace App\Http\Resourse;

 /**
 * The Receiver classes contain some important business logic. They know how to
 * perform all kinds of operations, associated with carrying out a request. In
 * fact, any class may serve as a Receiver.
 */
 

 //Это список конечных команд
class Receiver
{
    public function doSomething($a)
    {
        print("Receiver: sldjfgbljsdbsdj,fgbsdj,fgbsd,jgbsdfj,sb on (".$a.".)\n");
    }

    public function doSomethingElse($b)
    {
        print("Receiver: Also working on (".$b.".)\n");
    }
}