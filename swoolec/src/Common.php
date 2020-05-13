<?php

namespace Swoolec\Swoolec;


class Common
{
    static function displayItem($name, $value)
    {
        return "\e[32m" . str_pad($name, 30, ' ', STR_PAD_RIGHT) . "\e[34m" . $value . "\e[0m";
    }

    static public function releaseResource($source, $destination)
    {
        clearstatcache();

    }

    static public function opCacheClear()
    {
        if (function_exists('apc_clear_cache')) {
            apc_clear_cache();
        }

        if (function_exists('opcache_reset')) {
            opcache_reset();
        }
    }

    static public function wLog()
    {
        return <<<LOG
   _____                              _               
  / ____|                            | |              
 | (___   __      __   ___     ___   | |   ___    ___ 
  \___ \  \ \ /\ / /  / _ \   / _ \  | |  / _ \  / __|
  ____) |  \ V  V /  | (_) | | (_) | | | |  __/ | (__ 
 |_____/    \_/\_/    \___/   \___/  |_|  \___|  \___|
                                                      
LOG;
    }
}
