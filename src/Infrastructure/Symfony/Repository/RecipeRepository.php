<?php

namespace App\Infrastructure\Symfony\Repository;

use App\Domain\Recipe\Entity\Recipe;
use App\Domain\Recipe\Repository\RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
{
    public function add(Recipe $recipe): Recipe
    {
        $recipe->setId(1);

        return $recipe;
    }
}
