<?php

namespace App\Infrastructure\Symfony\EventListener;

use App\Domain\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $message = ['message' => $exception->getMessage()];

        if ($exception instanceof InvalidArgumentException) {
            $message = json_decode($exception->getMessage());
        }

        $response = new JsonResponse($message, Response::HTTP_INTERNAL_SERVER_ERROR);

        $event->setResponse($response);
    }
}
