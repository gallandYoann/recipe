<?php

namespace App\Domain\Exception;

class InvalidArgumentException extends \InvalidArgumentException
{
    public function __construct(string $message, string $code)
    {
        $message = json_encode(['message' => $message, 'code' => $code]);

        parent::__construct($message);
    }
}
