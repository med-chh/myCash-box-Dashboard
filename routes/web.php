<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;
use Laravel\Paddle\Cashier;


use App\Livewire\Settings\Profile\Profile;
use App\Livewire\Settings\Profile\Security;
use App\Livewire\Items\Categories\CategoriesList;


Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/settings', Security::class)->name('settings');
    Route::get('/settings/profile', Profile::class)->name('profiles');
    Route::get('/categories', CategoriesList::class)->name('categories.index');
    Route::get('/buy', function (Request $request) {
        $checkout = $request->user()->checkout(['pri_tshirt', 'pri_socks' => 5]);
        return view('buy', ['checkout' => $checkout]);
    })->name('buy');

});
