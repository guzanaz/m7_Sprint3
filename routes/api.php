<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VirtualMachineController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



    Route::get('register', [AuthController::class, 'show_signup_form'])->name('register');
    Route::post('register', [AuthController::class, 'process_signup']);



Route::group(['middleware' => ['cors']], function () {  
    Route::get('VirtualMachine',[VirtualMachineController::class,'indexApi'])->name('VirtualMachine.indexApi');
    Route::post('VirtualMachine', [VirtualMachineController::class,'storeApi'])->name('VirtualMachine.storeApi');
    Route::get('VirtualMachine/show/{virtualMachine}',[VirtualMachineController::class,'showApi'])->name('VirtualMachine.showApi');
    Route::put('VirtualMachine/{id}', [VirtualMachineController::class,'updateApi'])->name('VirtualMachine.updateApi');
    Route::delete('VirtualMachine/{id}',[VirtualMachineController::class,'destroyApi'])->name('VirtualMachine.destroyApi');
});




