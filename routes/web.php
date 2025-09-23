<?php

use App\Livewire\Page\About;
use App\Livewire\Page\Acomodation;
use App\Livewire\Page\Contact;
use App\Livewire\Page\Destination;
use App\Livewire\Page\Login;
use App\Livewire\Page\Search;
use App\Livewire\Page\Signup;
use App\Livewire\Page\Welcome;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProvinciaController;
use App\Http\Middleware\admin;
use App\Models\{Provincia,Accommodatio};
use App\Models\User;

Route::get('/', Welcome::class)->name('welcome');

Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');

Route::get('/login1', Login::class)->name('login1');
Route::get('/register1', Signup::class)->name('register1');
Route::get('/hotel', Acomodation::class)->name('hotel');
Route::get('/destination', Destination::class)->name('destination');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    

//painel administrativo

 Route::get('/dashboard', function () {

        $cprov=Provincia::count();
        $cuser=User::count();
     //   $chotel=Accommodation::count();

        return view('dashboard',compact('cprov','cuser'));
    })->name('dashboard');


Route::middleware(admin::class)->group(function(){

        //gerir provincia
        Route::get('/lista/provincia', [ProvinciaController::class, 'index'])->name('provincia.index');
        Route::get('/provincia/ver',[ProvinciaController::class, 'dashboard'])->name('dashboard1');
        Route::post('/provincia/store',[ProvinciaController::class, 'store'])->name('provincia.store');

});


    
});

Route::middleware('cliente')->group(function(){
        Route::get('/search', Search::class)->name('search');

});
