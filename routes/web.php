<?php

use App\Http\Controllers\ClientController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::Get('/clients', function () {
        return view('client.index');
    })->name('client.index');

    Route::Get('/clients/create', function () {
        return view('client.create');
    })->name('client.create');

    Route::get('/clients/{client:slug}', [
        ClientController::class, 'show',
    ])->name('client.show');

    Route::get('/clients/edit/{client:slug}', [
        ClientController::class, 'edit',
    ])->name('client.edit');

    Route::Get('/contacts', function () {
        return view('contact.index');
    })->name('contact.index');

    Route::Get('/contacts/create', function () {
        return view('contact.create');
    })->name('contact.create');

    Route::Get('/servers', function () {
        return view('server.index');
    })->name('server.index');

    Route::Get('/servers/create', function () {
        return view('server.create');
    })->name('server.create');

    Route::Get('/domains', function () {
        return view('domain.index');
    })->name('domain.index');

    Route::Get('/domains/create', function () {
        return view('domain.create');
    })->name('domain.create');
});
