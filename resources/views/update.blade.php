@extends('layout')

@section('title')Редактирование@endsection

@section('main_content')
    <!-- Секция заголовка страницы редактирования отзыва -->
    <section class="py-5 text-center container">
        <h1 class="h3 mb-3 fw-normal">Редактирование отзыва</h1>  
    </section>

    <!-- Секция вывода ошибок валидации -->
    <section class="py-5 text-start container">
        <!-- Проверка на наличие ошибок валидации -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <!-- Вывод списка ошибок -->
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif      
    </section>

    <!-- Секция формы для отправки отзыва -->
    <section class="py-5 text-center container">
        <form method="post" action="{{ route('update-submit', $data->id)}} "> <!-- Форма отправки отзыва для обновления -->
            @csrf <!-- Защита CSRF -->
            <div class="form-floating">
                <select name="subject_id" id="subject_id" class="form-select">
                    <!-- Выбор предмета отзыва -->
                    <option name="subject_id" id="subject_id" value="{{ $data->subject['id'] }}"> {{ $data->subject['name'] }}</option>
                    <!-- Варианты выбора предмета -->
                    <option name="subject_id" id="subject_id" value="1"> Базовые и прикладные информационные технологии </option>
                    <option name="subject_id" id="subject_id" value="2"> Гибкое управление проектами </option>
                    <option name="subject_id" id="subject_id" value="3"> Методология информационно-аналитической работы </option>
                </select>
                <label for="floatingPassword">Выберите предмет</label>
            </div><br>
            <!--<div class="form-floating">
                <input type="text" name="subject_id" id="subject_id" placeholder="Введите отзыв" class="form-control">
                <label for="floatingPassword">Введите отзыв</label>
            </div><br>-->
            <div class="form-floating">
                <!-- Поле для внесения текста отзыва -->
                <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение">{{ $data->message }}</textarea>
                <label for="floatingPassword">Введите сообщение</label>
            </div><br>
            <div class="form-floating">
                <!-- Кнопка для отправки отредактированного отзыва -->
                <button type="submit" class="btn btn-primary w-100 py-2"> Обновить </button>
            </div><br>
        </form>
    </section>
@endsection
