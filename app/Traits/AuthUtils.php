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
     * @param array $data valid request
     * @param object $user data user
     * @return boolean
     */
    protected function checkUserPassword(array $data, $user)
    {
        $userPassword = $user->password;

        if (!Hash::check($data['password'], $userPassword)) return false;

        $user->generateToken();
        
        return true;
    }
}