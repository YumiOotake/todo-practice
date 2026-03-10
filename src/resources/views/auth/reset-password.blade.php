@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">

@endsection
@section('content')
  <form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <input type="email" name="email" value="{{ $request->email }}">

    <input type="password" name="password">

    <input type="password" name="password_confirmation">

    <button type="submit">
        パスワード変更
    </button>


</form>

    <div class="login__link">
        <a href="/login" class="login__button-submit">ログインページへ</a>
    </div>
@endsection
