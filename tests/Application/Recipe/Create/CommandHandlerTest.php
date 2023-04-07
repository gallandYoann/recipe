<?php

namespace App\Tests\Application\Recipe\Create;

use App\Application\Recipe\Command\Create\Command;
use App\Application\Recipe\Command\Create\CommandHandler;
use App\Application\Recipe\Command\Create\Response;
use App\Domain\Recipe\Entity\Recipe;
use App\Domain\Recipe\Repository\RecipeRepositoryInterface;
use PHPUnit\Framework\TestCase;

class CommandHandlerTest extends TestCase
{
    public function testShouldReturnResponse()
    {
        $commandHandler = new CommandHandler($this->createRepositoryStub());
        $command = new Command('Test', 'Description');

        $result = $commandHandler->execute($command);

        $this->assertInstanceOf(Response::class, $result);
        $this->assertSame(1, $result->id);
        $this->assertSame('Test', $result->title);
        $this->assertSame('Description', $result->description);
    }

    private function createRepositoryStub(): RecipeRepositoryInterface
    {
        $repositorySub = $this->createStub(RecipeRepositoryInterface::class);
        $repositorySub->method('add')->willReturnCallback(function (Recipe $recipe) {
            $recipe->setId(1);

            return $recipe;
        });

        return $repositorySub;
    }
}
