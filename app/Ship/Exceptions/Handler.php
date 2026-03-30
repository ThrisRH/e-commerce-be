<?php

// /Users/tri/tlegoworld/app/Ship/Exceptions/Handler.php

namespace App\Ship\Exceptions;

use App\Ship\Helper\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return ApiResponse::error('Validation failed', 422, $e->errors());
        }

        if ($e instanceof NotFoundHttpException || $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            return ApiResponse::error(
                $e->getMessage() ?: 'Resource not found',
                404
            );
        }


        if ($e instanceof UnauthorizedHttpException) {
            return ApiResponse::error('Unauthorized', 401);
        }

        if ($e instanceof DuplicateSlugException) {
            return ApiResponse::error(
                $e->getMessage(),
                422,
                [
                    'field' => $e->field,
                    'value' => $e->value,
                ]
            );
        }

        return ApiResponse::error(
            $e->getMessage(),
            500,
            app()->environment('local') ? [
                'trace' => $e->getTrace(),
            ] : []
        );
    }
}
