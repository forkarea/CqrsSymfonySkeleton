<?php

namespace App\Domain\Command;

use App\Domain\Command\Handler\HandlerInterface;

interface CommandBusInterface {
    public function handle(HandlerInterface $handler);
}