<?php

namespace App\Traits;

trait ApiResponse
{
    public function ok($msg, $code = 200)
    {
        return response()->json([
            'message' => $msg,
            'status' => $code
        ]);
    }
}
