<?php
namespace Swoolec\Swoolec\Command;


use Swoolec\Swoolec\Command\DefaultCommand\Help;
use Swoolec\Swoolec\Singleton;

class CommandDispatch
{
    use Singleton;

    public function __construct()
    {
        CommandContainer::instance()->set(new Help());
    }

    public function run(array $args): ?string
    {
        $commandName = array_shift($args);
        if(empty($commandName))
            $commandName = 'help';
        else if($commandName != 'install')
        {
            //load system init
        }

        if(!CommandContainer::instance()->get($commandName))
            $commandName = 'help';

        return CommandContainer::instance()->hook($commandName, $args);
    }
}
