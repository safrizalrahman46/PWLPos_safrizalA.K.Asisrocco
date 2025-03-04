<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'manager 3',
        //     'password' => Hash::make('12345')
        // ];

        // UserModel::create($data);
        // $user = UserModel::find(1); // Retrieve all users
        // $user = UserModel::where('level_id', 1)->first();
        // $user = UserModel::firstWhere('level_id', 1);
        // $user = UserModel::findOr(20, ['username', 'nama'], function () {
        //     abort(404);
        // });

        // practicum 2,2
        // $user = UserModel::findOrFail(1);
        // $user = UserModel::where('username','manager9')->firstOrFail();

        // Practicum 2.3
        $jumlah_pengguna = UserModel::where('level_id',2 )->count();
        $users = UserModel::all();
        // $user = UserModel::firstWhere('level_id', 1);
        // dd($user);
        // Return the view with the user data

        // return view('user', ['userCount' => $userCount]);
        return view('user', compact('jumlah_pengguna','users'));
    }
}
