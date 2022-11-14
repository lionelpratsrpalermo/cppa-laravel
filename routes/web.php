<?php

use Illuminate\Support\Facades\Route;

// Controllers List
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'Home']);
Route::get('/profesionalismo/tabla_historica', [MainController::class, 'Historic_table_positions']);
Route::get('/profesionalismo/grand_slam/{gs_number}', [MainController::class, 'Grand_slam_index']);
Route::get('/profesionalismo/grand_slam/{gs_number}/fecha/{date_number}', [MainController::class, 'Grand_slam_date']);
Route::get('/profesionalismo/proxima_fecha', [MainController::class, 'Proxima_fecha']);

/* admin */
Route::get('/login', [MainController::class, 'Login']);
Route::get('/login/dologin/', [MainController::class, 'DoLogin']);
Route::get('/login/logout/', [MainController::class, 'Logout']);
Route::get('/dashboard/add_match', [MainController::class, 'Dashboard_add_match']);
Route::post('/dashboard/add_match/process_data', [MainController::class, 'Dashboard_add_match_process_data']);
Route::get('/dashboard/next_meet', [MainController::class, 'Dashboard_next_meet']);
Route::put('/dashboard/next_meet/update/{id_proxima_fecha}', [MainController::class, 'Dashboard_next_meet_update']);
