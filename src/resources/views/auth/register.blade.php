@extends('layouts.auth')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')
    <div class="register-form__content">
        <div class="register-form__heading">
            <h2 class="register-form__heading-ttl">会員登録ページ</h2>
        </div>
        <form action="{{ route('register') }}" method="POST" class="form">
            @csrf
            <div class="form__group">
                <div class="form__group-ttl">
                    <span class="form__label--item">名前</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-ttl">
                    <span class="form__label--item">年齢</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <input type="number" name="age" value="{{ old('age') }}">
                </div>
                <div class="form__error">
                    @error('age')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-ttl">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-ttl">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <input type="tel" name="tel" value="{{ old('tel') }}">
                </div>
                <div class="form__error">
                    @error('tel')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-ttl">
                    <span class="form__label--item">パスワード</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="password" name="password" />
                    </div>
                    <div class="form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-ttl">
                    <span class="form__label--item">確認用パスワード</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="password" name="password_confirmation" />
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit">登録</button>
            </div>
        </form>
        <div class="login__link">
            <a href="/login" class="login__button-submit">ログインページへ</a>
        </div>
    </div>
@endsection
