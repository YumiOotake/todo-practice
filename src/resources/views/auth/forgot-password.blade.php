@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{ asset('css/forgot.css') }}">

@endsection
@section('content')
  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <input type="email" name="email" placeholder="email">

    <button type="submit">
        パスワードリセットメール送信
    </button>

</form>
@endsection
