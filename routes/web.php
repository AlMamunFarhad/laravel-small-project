<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Post;
use App\Models\User;

// Route::get('/', function () {



// // return view('welcome');

   
// });
Route::get('/', function () {

    // return view('welcome');

  // $post = new Post;
  // $post->title = "Thsi is first title";
  // $post->description = "Thsi is first description";
  // $post->save();

  // return "<h1>Post Created.</h1>";
  // dd(User::where('id', 1));
    // dd(User::all());
   
    // dd(User::select('email')->orderBy('id','desc')->get());


  // model updated

  // $user = User::find(1)->delete();

  // $user = User::find(1);
  // $user->name = "Farhad ";
  // $user->email = "farhad000@gamil.com";

  // $user->update();

// $user = User::create([

//   'name'=> 'farhad',
//   'email'=> 'email@gmail.com',
//   'password'=> '123'

// ]);

// return "<h1>User Updated.</h1>";
// return "<h1>User delete.</h1>";
// return "<h1>User create.</h1>";


  // dd(User::first()->name);
  // dd(User::get());
  // dd(User::orderBy('created_at', 'desc')->first()->id);
  // $user = User::orderBy('created_at', 'desc')->first();
  // $user->name = "My name is farhad.";

  // $user->save();
  foreach(User::orderBy('created_at', 'desc')->get() as $user){
    echo $user->name;
   echo "<br>";
  }



})->name('home');
// ->name('home')
// Route::post('/user', UsersController::class);
Route::post('/create/dummy', [UsersController::class, 'create_dummy_data'])->name('users.create.dummy');
Route::delete('/create/dummy', [UsersController::class, 'delete_dummy_data'])->name('delete.dummy.data');
Route::resource('/users', UsersController::class);

