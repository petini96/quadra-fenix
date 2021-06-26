<?php

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

Route::get('/create-role', function () {
    $role = new \Spatie\Permission\Models\Role;
    $permission = new \Spatie\Permission\Models\Permission;
    $role->create([
        'name' => 'admin'
    ]);
});

Route::get('/create-admin' , function(){
    $user = \App\User::create([
        'name' => 'Rubinho',
        'email' => 'rubens_fenix@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
    ]);
    
    return $user->assignRole('admin');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
