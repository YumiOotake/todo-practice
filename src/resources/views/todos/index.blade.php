@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/todos.css') }}">
@endsection
@section('content')
    <div class="todo__content">
        <div class="todo__section">
            <div class="section__title">
                <h1>Todo</h1>
            </div>
            <div class="section__button">
                <form action="{{ route('todos.create') }}" class="add__form" method="get">
                    <button class="add__form-button">Add</button>
                </form>
            </div>
        </div>
        <div class="todo-search__section">
            <div class="todo-search__title">
                <h2>Todo Search</h2>
            </div>
            <form action="{{ route('todos.search') }}" class="search-form" method="get">
                <div class="search-form__item">
                    <input type="text" name="keyword" value="{{ old('keyword') }}" placeholder="キーワードを入力">
                </div>
                <div class="search-form__category">
                    <select name="category_id">
                        <option value="">category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search-form__status">
                    <select name="status_id">
                        <option value="">status</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search-form__button">
                    <button class="search-form__button--submit" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="todo-table">
            <table class="todo-table__inner">
                <tr class="todo-table__row">
                    <th class="todo-table__header">Todo</th>
                    <th class="todo-table__header">Category</th>
                    <th class="todo-table__header">Status</th>
                </tr>
                @foreach ($todos as $todo)
                    <tr class="todo-table__row">
                        <td class="todo-table__item">{{ $todo->title }}</td>
                        <td class="todo-table__item">{{ $todo->category->name }}</td>
                        <td class="todo-table__item">{{ $todo->status->name }}</td>

                        <td class="todo-table__item">
                            <form action="{{ route('todos.edit', $todo->id) }}" class="update-form" method="get">
                                <div class="update-form__button">
                                    <button class="update-form__button-submit" type="submit">update</button>
                                </div>
                            </form>
                        </td>
                        <td class="todo-table__item">
                            <form action="{{ route('todos.destroy', $todo->id) }}" class="delete-form" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="delete-form__button">
                                    <button class="delete-form__button-submit" type="submit">delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
