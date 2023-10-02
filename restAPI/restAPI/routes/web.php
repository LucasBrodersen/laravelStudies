<?php

use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post/{slug}', [PostController::class, 'show']);


Route::get('/setup', function () {
    $credentials = [
        'email' => 'admin4@admin.com',
        'password' => 'password'
    ];

    // Check if the user with the provided email already exists
    $existingUser = User::where('email', $credentials['email'])->first();

    if (!$existingUser) {
        // Create a new user document in MongoDB
        $user = new User();

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();
    }

    // Attempt to log in the user
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
        $updateToken = $user->createToken('update-token', ['create', 'update']);
        $basicToken = $user->createToken('basic-token');

        return [
            'admin' => $adminToken->plainTextToken,
            'update' => $updateToken->plainTextToken,
            'basic' => $basicToken->plainTextToken,
        ];
    }
});
