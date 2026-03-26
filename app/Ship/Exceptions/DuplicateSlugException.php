<?php
// /Users/tri/tlegoworld/app/Ship/Exceptions/DuplicateSlugException.php

namespace App\Ship\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class DuplicateSlugException extends Exception
{
    public $field;
    public $value;

    public function __construct(string $field, string $value, string $message = null, int $code = Response::HTTP_UNPROCESSABLE_ENTITY, ?\Throwable $previous = null)
    {
        $this->field = $field;
        $this->value = $value;
        $message = $message ?? "The {$field} '{$value}' already exists.";
        
        parent::__construct($message, $code, $previous);
    }
}
