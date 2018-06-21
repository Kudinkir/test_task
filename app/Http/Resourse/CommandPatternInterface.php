<?php

namespace App\Http\Resourse;

//определяем интерфейс команды
interface CommandPatternInterface
{
    public function execute();
}