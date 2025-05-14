<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => [
                'Home',
                'Welcome'
            ]
        ];

        $activeMenu = 'dashboard';

        return view('welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $username = $user->username;

        // Define the storage path
        $imagePath = public_path('Adminlte/dist/img/');
        $imageName = $username . '.png';

        // Check if the file already exists and delete it
        if (file_exists($imagePath . $imageName)) {
            unlink($imagePath . $imageName);
        }

        // Move the uploaded file to the target directory
        $request->profileImage->move($imagePath, $imageName);

        return response()->json([
            'status' => true,
            'message' => 'Profile image updated successfully',
        ]);
    }
}
