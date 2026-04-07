<?php

namespace App\Ship\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class NotFoundException extends Exception
{
    public function __construct(string $message = 'The requested resource was not found.', int $code = Response::HTTP_NOT_FOUND, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
