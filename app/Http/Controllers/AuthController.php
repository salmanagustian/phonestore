<?php

namespace App\Http\Controllers;

use App\Traits\AuthUtils;
use App\Traits\ResponseUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthUtils, ResponseUtils;
    
    /**
     * 
     * @param Illuminate\Http\Request $request
     * @return object
     */
    public function login(Request $request)
    {
        $validRequest = $this->validate($request, $this->rules(), $this->displayErrorMessages());

        $user = $this->getUser($validRequest);

        if(!$user || !Hash::check($validRequest['password'], $user->password))
            return $this->sendResponseFail(__('auth.failed'));

        $token = $this->createUserToken($user);
            
        return response()->json([
            'status' => true,
            'data'   => [
                'type'       => 'user',
                'id'         => $user->id,
                'attributes' => [
                    'fullname'   => $user->fullname,
                    'username'   => $user->username,
                    'points'     => $user->points,
                    'roles'      => $user->roles,
                    'created_at' => $user->created_at(),
                ]
            ],
            'token'  => $token
        ]);
    }

}
