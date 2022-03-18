<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {
    $account = $request->input('account');
    $pwd = $request->input('pwd');
    
    if ($account == 'admin' && $pwd == 'admin') {
        session(['login' => true, 'user' => $account]);
        return redirect('/success');
    } else {
        return redirect('/login');
    }
});

Route::get('/success', function (Request $request) {
    $login = session('login');
    $user = session('user');

    if ($login == true) {
        return view('welcome', ['user' => $user]);
    } else {
        return redirect('/login');
    }
});

Route::get('/logout', function (Request $request) {
    // $request->session()->forget(['login', 'user']); // 刪除指定數據
    // $request->session()->flush(); // 刪除所有數據
    $request->session()->invalidate(); // 移除所有的資料，並重新生成 Session ID
    // $request->session()->regenerateToken(); // 重新生成 Session ID。

    return redirect('/login');
});