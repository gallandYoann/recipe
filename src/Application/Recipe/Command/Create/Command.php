<?php

namespace App\Application\Recipe\Command\Create;

readonly class Command
{
    public function __construct(
        private string $title,
        private string $description,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
