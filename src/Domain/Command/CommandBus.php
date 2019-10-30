<?php

namespace App\Domain\Command;

use App\Domain\Command\Handler\DefaultHandler\CreateHandler;
use App\Domain\Command\Handler\HandlerInterface;
use App\Service\JsonSerializerServiceInterface;

class CommandBus implements CommandBusInterface
{
    private $serializer;

    public function __construct(JsonSerializerServiceInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function handle(string $type, string $content)
    {
        $handler = $this->strategy($type);
        return $handler->handle($content);
    }

    private function strategy(string $type): HandlerInterface
    {
        switch ($type) {
            case 'create':
                return new CreateHandler($this->serializer);
        }
    }
}