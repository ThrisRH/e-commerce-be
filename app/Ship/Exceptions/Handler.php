<?php
// /Users/tri/tlegoworld/app/Ship/Exceptions/Handler.php

namespace App\Ship\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Ship\Helper\ApiResponse;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        // Handle NotFoundHttpException (404)
        if ($e instanceof NotFoundHttpException) {
            return ApiResponse::error($e->getMessage() ?: 'Resource not found', 404);
        }

        // Handle DuplicateSlugException (422)
        if ($e instanceof DuplicateSlugException) {
            return ApiResponse::error($e->getMessage(), 422, [
                'field' => $e->field,
                'value' => $e->value,
            ]);
        }

        return parent::render($request, $e);
    }
}
