<?php

namespace App\Domain\Recipe\Entity;

use App\Domain\Exception\InvalidArgumentException;

class Recipe
{
    public function __construct(
        private ?int $id,
        private string $title,
        private string $description = '',
    ) {
        if (empty($title)) {
            throw new InvalidArgumentException('The title can not be empty', 'recipe_title_empty');
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
