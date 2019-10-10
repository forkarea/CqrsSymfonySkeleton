<?php

namespace App\Domain\Command;

use App\Domain\Command\Handler\HandlerInterface;

class CommandBus implements CommandBusInterface
{
    public function handle(HandlerInterface $handler)
    {
        $handler->handle();
    }
}