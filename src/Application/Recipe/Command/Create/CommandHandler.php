<?php

namespace App\Application\Recipe\Command\Create;

use App\Domain\Recipe\Entity\Recipe;
use App\Domain\Recipe\Repository\RecipeRepositoryInterface;

readonly class CommandHandler
{
    public function __construct(private RecipeRepositoryInterface $recipeRepository)
    {
    }

    public function execute(Command $command): Response
    {
        $recipe = new Recipe(null, $command->getTitle(), $command->getDescription());
        $response = $this->recipeRepository->add($recipe);

        return new Response($response->getId(), $response->getTitle(), $response->getDescription());
    }
}
