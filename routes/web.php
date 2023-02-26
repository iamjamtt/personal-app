<?php

use App\Http\Livewire\Admin\Gastos\CreateEdit as GastosCreateEdit;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Perfil\Edit as PerfilEdit;
use App\Http\Livewire\Admin\Perfil\Index as PerfilIndex;
use App\Http\Livewire\Admin\Users\Index as UsersIndex;
use App\Http\Livewire\Admin\Gastos\Index as GastosIndex;
use App\Http\Livewire\Admin\Gastos\Show as GastoShow;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('welcome');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');

// admin
Route::prefix('admin')->middleware('auth','admin')->group(function () {
    Route::get('/', Home::class)->name('admin.home');
    Route::get('/perfil', PerfilIndex::class)->name('admin.perfil');
    Route::get('/perfil/{id}/edit', PerfilEdit::class)->name('admin.perfil.edit');
    // users
    Route::get('/users', UsersIndex::class)->name('admin.users');
    // gastos
    Route::get('/gastos', GastosIndex::class)->name('admin.gastos');
    Route::get('/gastos/create', GastosCreateEdit::class)->name('admin.gastos.create');
    Route::get('/gastos/{gasto_id}/edit', GastosCreateEdit::class)->name('admin.gastos.edit');
    Route::get('/gastos/{gasto_id}', GastoShow::class)->name('admin.gastos.show');
});

// client
Route::prefix('client')->middleware('auth','client')->group(function () {
    Route::get('/', Home::class)->name('client.home');
    Route::get('/perfil', PerfilIndex::class)->name('client.perfil');
    Route::get('/perfil/{id}/edit', PerfilEdit::class)->name('client.perfil.edit');
    // gastos
    Route::get('/gastos', GastosIndex::class)->name('client.gastos');
    Route::get('/gastos/create', GastosCreateEdit::class)->name('client.gastos.create');
    Route::get('/gastos/{gasto_id}/edit', GastosCreateEdit::class)->name('client.gastos.edit');
    Route::get('/gastos/{gasto_id}', GastoShow::class)->name('client.gastos.show');
});
