<?php
namespace Swoolec\Swoolec;

trait Singleton
{
    static private $instance;

    static public function instance(...$args)
    {
        if(!isset(self::$instance))
        {
            self::$instance = new static(...$args);
        }

        return self::$instance;
    }
}
