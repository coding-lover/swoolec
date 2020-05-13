<?php

namespace Swoolec\Swoolec\Command\DefaultCommand;

use Swoolec\Swoolec\Command\CommandContainer;
use Swoolec\Swoolec\Command\CommandInterface;
use Swoolec\Swoolec\Common;

class Help implements CommandInterface
{

    public function commandName(): string
    {
        return 'help';
    }

    public function exec(array $args): ?string
    {
        if(!isset($args[0]))
        {
            return $this->help($args);
        }
        else
        {
            $commandName = $args[0];
            array_shift($args);
            $call = CommandContainer::instance()->get($commandName);
            if($call instanceof CommandInterface)
                return $call->help($args);
            else
                return "no help message for command {$commandName} was found.";
        }
    }

    public function help(array $args): ?string
    {
        $allCommand = implode(PHP_EOL, CommandContainer::instance()->commandList());
        $logo = Common::wLog();
        return $logo . PHP_EOL . <<<HELP
Welcome To swoolec Command Console !
Usage: php swoolec [command] [args]
Get help: php swoolec help [command]
Current Registered Command:
{$allCommand}
HELP;
    }
}
