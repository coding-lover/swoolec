<?php
namespace Swoolec\Swoolec\Command;

use Swoolec\Swoolec\Singleton;

class CommandContainer
{
    use Singleton;

    private $container = [];

    public function set(CommandInterface $command, $isCover = false)
    {
        $commandName = strtolower($command->commandName());
        if(!isset($this->container[$commandName]) || $isCover)
        {
            $this->container[$commandName] = $command;
        }
    }

    public function get($name): ?CommandInterface
    {
        $name = strtolower($name);
        return isset($this->container[$name]) ? $this->container[$name] : null;
    }

    public function commandList(): ?array
    {
        return array_keys($this->container);
    }

    public function hook($commandName, $args): ?string
    {
        $command = $this->get($commandName);

        return $command ? $command->exec($args) : null;
    }
}
