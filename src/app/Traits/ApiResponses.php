<?php

namespace App\Traits;

trait ApiResponses{

     
  protected function ok($message,$data=[])
  {
    return $this->successResponse($message,$data, 200);
  }


    public function successResponse($message,$data=[], $code = 200)
    {
        return response()->json([
          'data' => $data,
          'message' => $message,
          'code' => $code
        ], $code);
    }

    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
}