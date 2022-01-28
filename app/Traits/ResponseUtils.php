<?php

namespace App\Traits;

trait ResponseUtils 
{
    public function sendResponseSuccess($messageSuccess)
    {
        return response()->json(['status' => true, 'message' => $messageSuccess]);
    }
    public function sendResponseFail($messageFail)
    {
        return response()->json(['status' => false, 'message' => $messageFail]);
    }
}