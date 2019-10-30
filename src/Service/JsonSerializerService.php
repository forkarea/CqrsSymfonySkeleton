<?php

namespace App\Service;

use JMS\Serializer\SerializerInterface;

class JsonSerializerService implements JsonSerializerServiceInterface
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serialize($data): string
    {
        return $this->serializer->serialize($data, 'json');
    }

    public function deserialize($content, $class)
    {
        return $this->serializer->deserialize($content, $class, 'json');
    }
}