<?php

namespace App\Domain\Command\DefaultHandler;

use App\Domain\Command\Handler\HandlerInterface;
use App\Domain\Entity\DefaultEntity;
use App\Service\JsonSerializerServiceInterface;

class CreateHandler implements HandlerInterface
{
    private $serializer;

    public function __construct(JsonSerializerServiceInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function handle(string $content)
    {
        $this->serializer->deserialize($content, DefaultEntity::class);
    }
}