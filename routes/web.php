<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ServerController;
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
    'verified',
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

    Route::get('/contacts/edit/{contact:id}', [
        ContactController::class, 'edit',
    ])->name('contact.edit');

    Route::Get('/servers', function () {
        return view('server.index');
    })->name('server.index');

    Route::Get('/servers/create', function () {
        return view('server.create');
    })->name('server.create');

    Route::get('/servers/show', function () {
        return view('server.show');
    })->name('server.show');

    Route::get('/servers/edit/{server:id}', [
        ServerController::class, 'edit',
    ])->name('server.edit');

    Route::get('/servers/server-ten', function () {
        return view('server.server_ten');
    })->name('server.show.server_ten');

    Route::get('/servers/server-nine', function () {
        return view('server.server_nine');
    })->name('server.show.server_nine');

    Route::get('/servers/server-eight', function () {
        return view('server.server_eight');
    })->name('server.show.server_eight');

    Route::get('/servers/server-six', function () {
        return view('server.server_six');
    })->name('server.show.server_six');

    Route::get('/servers/server-five', function () {
        return view('server.server_five');
    })->name('server.show.server_five');

    Route::get('/servers/server-four', function () {
        return view('server.server_four');
    })->name('server.show.server_four');

    Route::get('/servers/server-three', function () {
        return view('server.server_three');
    })->name('server.show.server_three');

    Route::get('/servers/server-two', function () {
        return view('server.server_two');
    })->name('server.show.server_two');

    Route::get('/servers/server-one', function () {
        return view('server.server_one');
    })->name('server.show.server_one');

    Route::Get('/domains', function () {
        return view('domain.index');
    })->name('domain.index');

    Route::Get('/domains/create', function () {
        return view('domain.create');
    })->name('domain.create');

    Route::Get('/domains/edit/{domain:id}', [
        DomainController::class, 'edit',
    ])->name('domain.edit');

    Route::Get('/import-test', [DomainController::class, 'import']);
});
