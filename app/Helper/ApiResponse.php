<?php

namespace App\Helper;

use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ApiResponse
{
    public static function success($data = null, $message = 'Success', $code = Response::HTTP_OK)
    {
        $meta = null;

        if ($meta instanceof LengthAwarePaginator) {
            $meta = [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
            ];
        }

        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'meta' => $meta,
        ], $code);
    }

    public static function error($message = 'Error', $code = Response::HTTP_INTERNAL_SERVER_ERROR, $data = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
