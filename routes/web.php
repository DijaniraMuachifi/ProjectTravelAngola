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

Route::get('/', Welcome::class)->name('welcome');
Route::get('/search', Search::class)->name('search');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/destination', Destination::class)->name('destination');
Route::get('login', Login::class)->name('login');
Route::get('register', Signup::class)->name('register');
Route::get('hotel', Acomodation::class)->name('hotel');
