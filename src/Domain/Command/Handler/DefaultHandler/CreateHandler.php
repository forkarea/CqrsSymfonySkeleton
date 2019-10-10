<?php

namespace App\Domain\Command\DefaultHandler;

use App\Domain\Command\Handler\HandlerInterface;
use App\Domain\Entity\DefaultEntity;
use JMS\Serializer\SerializerInterface;

class CreateHandler implements HandlerInterface
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function handle(string $content)
    {
        $this->serializer->deserialize($content, DefaultEntity::class, 'json');
    }
}