<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;
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

//Route for insert operation
Route::get('/insert',function(){
    $user = User::find(1);
    $role = new Role(['name'=>'Admin']);
    $user->roles()->save($role);
});

//Route to read data from database
Route::get('/read',function(){
    $user = User::findOrFail(1);
    foreach($user->roles as $role){
        echo $role->name;
    }
});

//Route to delete data from database
Route::get('/update',function(){
    $user = User::findOrFail(1);
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name = 'Admin') {
                $role->name = "adminstrator";
                $role->save();
            }
        }
    }
});
