@extends('layout')

@section('title')Отзывы@endsection

@section('main_content')
    <!-- Секция заголовка страницы отзывов -->
    <section class="py-5 text-center container">
        <h1 class="h3 mb-3 fw-normal">Напишите свой отзыв!</h1>  
    </section>

    <!-- Секция вывода ошибок валидации -->
    <section class="py-5 text-start container">
        @if($errors->any())
            <!-- Проверка на наличие ошибок валидации -->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }} </li> <!-- Вывод ошибок валидации -->
                    @endforeach
                </ul>
            </div>
        @endif      
    </section>

    <!-- Секция формы для отправки отзыва -->
    <section class="py-5 text-center container">
        <form method="post" action="/review/check"> <!-- Форма отправки отзыва -->
            @csrf <!-- Защита CSRF -->
            <div class="form-floating">
                <select name="subject_id" id="subject_id" class="form-select">
                    <option value="" disabled selected></option> <!-- Пустая опция для выбора предмета -->
                    <option value="1"> Базовые и прикладные информационные технологии </option>
                    <option value="2"> Гибкое управление проектами </option>
                    <option value="3"> Методология информационно-аналитической работы </option>
                </select>
                <label for="floatingPassword">Выберите предмет</label>
            </div><br>
            <div class="form-floating">
                <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea>
                <label for="floatingPassword">Введите сообщение</label>
            </div><br>
            <div class="form-floating">
                <button type="submit" class="btn btn-primary w-100 py-2"> Отправить </button>
            </div><br>
        </form>
    </section>
@endsection
