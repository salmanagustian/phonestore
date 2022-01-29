<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait AuthUtils
{
    
    /**
     * 
     * @return array
     */
    protected function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * 
     * @return array
     */
    protected function displayErrorMessages()
    {
        return [
            'username.required' => 'Silahkan isi username',
            'password.required' => 'Silahkan isi password',
        ];
    }

    /**
     * @param array $data valid request
     * @return object
     */
    protected function getUser(array $data)
    {
        return User::where('username', $data['username'])->first();
    }

    /**
     * @param object $user
     * @return string Plain Text Token.
     */

    protected function createUserToken($user)
    {
        return $user->createToken('auth_token')->plainTextToken;
    }
}