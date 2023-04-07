<?php

namespace App\Application\Recipe\Command\Create;

class Response
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description
    ) {
    }
}
