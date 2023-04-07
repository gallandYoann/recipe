<?php

namespace App\Tests\Domain\Recipe\Entity;

use App\Domain\Recipe\Entity\Recipe;
use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{
    public function testShouldBuildInvalidRecipe(): void
    {
        $recipe = new Recipe(null, 'test');

        $this->assertSame('test', $recipe->getTitle());
    }

    public function testShouldNotBuildInvalidRecipe(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Recipe(null, '');
    }
}
