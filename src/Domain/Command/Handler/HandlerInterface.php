<?php

namespace App\Domain\Command\Handler;

interface HandlerInterface {
    public function handle(string $content);
}