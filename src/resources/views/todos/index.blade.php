@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/todos/index.css') }}">
@endsection
@section('content')
    <div class="todo__alert">
        @if (session('message'))
            <div class="todo__alert--success"></div>
        @endif
        @if ($errors->any())
            <div class="todo__alert--danger">
                <ul>
                    @foreach ($errors->all as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection
