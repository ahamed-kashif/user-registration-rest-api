<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse{

    protected function successResponse($data, $code = 200, $message = null): JsonResponse
    {
        return response()->json([
            'success'=> true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($code, $message = null, $data = []): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }

}
