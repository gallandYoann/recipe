<?php

namespace App\Infrastructure\Symfony\Controller;

use App\Application\Recipe\Command\Create\Command;
use App\Application\Recipe\Command\Create\CommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class CreateRecipeController extends AbstractController
{
    public function __construct(private readonly CommandHandler $handler)
    {
    }

    #[Route('/recipe', name: 'add_recipe', methods: Request::METHOD_POST)]
    public function __invoke(Request $request, SerializerInterface $serializer): Response
    {
        $command = $serializer->deserialize($request->getContent(), Command::class, 'json');

        return $this->json($this->handler->execute($command));
    }
}
