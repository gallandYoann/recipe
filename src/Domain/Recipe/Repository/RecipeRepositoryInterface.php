<?php

namespace App\Domain\Recipe\Repository;

use App\Domain\Recipe\Entity\Recipe;

interface RecipeRepositoryInterface
{
    public function add(Recipe $recipe): Recipe;
}
