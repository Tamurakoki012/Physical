<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TimelineController;
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

//Route::get('/', function () {
//return view('welcome');
//});


Route::get('/', [PlayersController::class, 'signin'])->name('login');
Route::get('/login', [PlayersController::class, 'signin']);
Route::get('/manager', [ManagerController::class, 'manager_signin']);
Route::get('/delete', [PlayersController::class, 'delete']);
Route::post('/delete', [PlayersController::class, 'delete']);
Route::get('/edit', [ManagerController::class, 'edit']);
Route::post('/edit', [ManagerController::class, 'edit']);
Route::post('/update1', [PlayersController::class, 'update1']);
Route::post('/update2', [PlayersController::class, 'update2']);
Route::get('/login_cmplete', [PlayersController::class, 'login']);
Route::post('/login_cmplete', [PlayersController::class, 'login']);
Route::get('/index', [PlayersController::class, 'index_page']);
Route::post('/index', [PlayersController::class, 'index_page']);
Route::get('/new', [PlayersController::class, 'new']);
Route::get('/new', [PlayersController::class, 'new', 'new_post']);
Route::post('/new', [PlayersController::class, 'new_post']);
Route::post('/confirm', [PlayersController::class, 'confirm']);
Route::get('/complete', [PlayersController::class, 'complete'])->name('complete');
Route::post('/complete', [PlayersController::class, 'complete'])->name('complete');
Route::get('/logout', [PlayersController::class, 'doLogout']);
// 一般ユーザー
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
  Route::get('/password', [HomeController::class, 'changePassword'])->name('password');
  Route::post('/password', [HomeController::class, 'updatePassword'])->name('update-password');
  Route::get('/target', [TrainingController::class, 'exercise']);
  Route::post('/target', [TrainingController::class, 'exercise']);
  Route::get('/target_complete', [TrainingController::class, 'target_complete'])->name('target_complete');
  Route::post('/target_complete', [TrainingController::class, 'target_complete','traget_all_complete'])->name('target_complete');
  Route::get('/outcome', [AchievementController::class, 'achievement']);
  Route::post('/outcome', [AchievementController::class, 'achievement']);
  Route::get('/today_complete', [AchievementController::class, 'today_complete']);
  Route::post('/today_complete', [AchievementController::class, 'today_complete', 'update_achievement',]);
  Route::get('/mypage', [AchievementController::class, 'my_page']);
  Route::post('/mypage', [AchievementController::class, 'my_page']);
  Route::get('/mydate', [PlayersController::class, 'userdate']);
  Route::post('/mydate_store', [PlayersController::class, 'userdate_store']);
  Route::get('/profile', [PlayersController::class, 'mydate_profile']);
  Route::post('/profile', [PlayersController::class, 'mydate_profile']);
  Route::get('/cha', function () {
    return view('players.cha');
  });
  Route::post('/cha', function () {
    return view('players.cha');
  });

  Route::get('/timeline', [TimelineController::class,'showTimelinePage']);   // <--- 追加
  Route::post('/timeline', [TimelineController::class,'postTweet']);
});

Route::get('/aaa', function () {
  return view('players.aaa');
});

Route::get('/aaaa', function () {
  return view('players.aaaa');
});

Route::get('/serch',[PlayersController::class, 'serch']);
// 画像投稿ページを表示
Route::get('/create3', [UploadController::class, 'postimg']);
// 画像投稿をコントローラーに送信
Route::post('/newimgsend', [UploadController::class, 'saveimg']);

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
  Route::get('/manager_list', [ManagerController::class, 'manager_login']);
  Route::post('/manager_list', [ManagerController::class, 'manager_login', 'manager_page']);
});
