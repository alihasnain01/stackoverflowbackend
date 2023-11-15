<?php

use App\Http\Controllers\IssueController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('issues/{id}/solutions', [IssueController::class, 'postSolution']);
});


Route::post('signin', [UserController::class, 'login']);
Route::post('signup', [UserController::class, 'register']);

Route::get('topics', [TopicController::class, 'getTopics']);

Route::prefix('issues')->group(function () {
    Route::get('/', [IssueController::class, 'getIssueById']);
    Route::get('/{id}', [IssueController::class, 'getSingleIssue']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [TopicController::class, 'getCategories']);
});
