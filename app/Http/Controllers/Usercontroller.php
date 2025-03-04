<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $data = [
            'level_id' => 2,
            'username' => 'manager_tiga',
            'nama' => 'manager 3',
            'password' => Hash::make('12345')
        ];

        UserModel::create($data);
        $user = UserModel::all(); // Retrieve all users

        // Return the view with the user data
        return view('user', ['data' => $user]);
    }
}
