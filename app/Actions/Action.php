<?php

namespace App\Actions;

abstract class Action
{
    public static function make(): static
    {
        return app(static::class);
    }

    abstract function handle();
}
