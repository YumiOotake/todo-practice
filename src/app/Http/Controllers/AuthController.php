<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        // Auth::logout(); //ログイン情報削除
        // $request->session()->invalidate(); //セッション破棄
        // $request->session()->regenerateToken(); //CSRFトークン再生成
        // return redirect()->route('todos.index');
    }
    // public function index()
    // {
    //     return view('index');
    // }
}
