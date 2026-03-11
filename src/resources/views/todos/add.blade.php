@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
@endsection
@section('content')
    @if ($errors->any())
        <div class="todo__error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="todo__content">
        <div class="todo__section">
            <div class="section__title">
                <h1>Todo Add</h1>
            </div>
        </div>
        <form action="{{ route('todos.store') }}" method="post" class="add-form">
            @csrf
            <div class="add-form__content">
                <div class="add-form__item">
                    <input type="text" name="title" value="{{ old('title') }}">
                </div>
                <div class="add-form__item">
                    <select name="category_id">
                        <option value="">category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="add-form__item">
                    <select name="status_id">
                        <option value="">status</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="add-form__button">
                <button class="add-form__button--submit" type="submit">Add</button>
            </div>
        </form>
    </div>
@endsection
