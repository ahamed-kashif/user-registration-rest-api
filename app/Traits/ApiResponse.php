<?php
namespace App\Traits;

trait ApiResponse{

    protected function successResponse($data, $code = 200, $message = null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success'=> true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($code, $message = null, $data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }

}
