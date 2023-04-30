<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIsAdmin;

/*--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------*/

    Auth::routes();

    // Users API
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/usersauth', [App\Http\Controllers\UserController::class, 'userAuth'])->middleware('checkisadmin');
    Route::post('/users/create', [App\Http\Controllers\UserController::class, 'store']);
    Route::delete('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

    // Groups API
    Route::post('/groups/create', [App\Http\Controllers\GroupController::class, 'store']);
    Route::get('/groups', [App\Http\Controllers\GroupController::class, 'index']);
    Route::get('/groups/users/{group_id}', [App\Http\Controllers\GroupController::class, 'get_users_group']);
    Route::put('/groups/add_user', [App\Http\Controllers\GroupController::class, 'add_user_to_group']);
    Route::put('/groups/edit_users', [App\Http\Controllers\GroupController::class, 'edit_users_group']);
    Route::delete('/groups/delete/{id}', [App\Http\Controllers\GroupController::class, 'destroy']);

