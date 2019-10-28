<?php

namespace App\Service;


interface JsonSerializerServiceInterface
{
    public function serialize($data): string;

    public function deserialize($content, $class);
}