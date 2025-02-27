<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Define the data to be updated
        $data = [
            'nama' => 'Pelanggan Pertama', // Name to be updated
        ];

        // Update user where username = 'customer-1'
        UserModel::where('username', 'customer-1')->update($data);

        // Access the UserModel to get all data from the m_user table
        $user = UserModel::all(); // Retrieve all users

        // Return the view with the user data
        return view('user', ['data' => $user]);
    }
}
