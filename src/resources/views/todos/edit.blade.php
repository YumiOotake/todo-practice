@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
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
                <h1>Todo Edit</h1>
            </div>
        </div>
        <form action="{{ route('todos.update', $todo->id) }}" method="post" class="update-form">
            @method('PATCH')
            @csrf
            <div class="update-form__content">
                <div class="update-form__item">
                    <input type="text" name="title" value="{{ old('title', $todo->title) }}">
                </div>
                <div class="update-form__item">
                    <select name="category_id">
                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"{{ old('category_id', $todo->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="update-form__item">
                    <select name="status_id">
                        @foreach ($statuses as $status)
                            <option
                                value="{{ $status->id }}"{{ old('status_id', $todo->status_id) == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="update-form__button">
                <button class="update-form__button--submit" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
