<?php

namespace App\Http\Controllers;

use App\Traits\AuthUtils;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthUtils;
    
    /**
     * 
     * @param Illuminate\Http\Request $request
     * @return object
     */
    public function login(Request $request)
    {
        $validRequest = $this->validate($request, $this->rules(), $this->displayErrorMessages());

        $user = $this->getUser($validRequest);

        if(!$user)
            return response(['status' => false, 'message' => __('passwords.user')]);    

        $checkPassword = $this->checkUserPassword($validRequest, $user);

        if(!$checkPassword)
            return response(['status' => false, 'message' => __('auth.failed')]);  
            
        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }

}
