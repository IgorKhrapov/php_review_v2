@extends('layout')

@section('title')Просмотр отзывов@endsection

@section('main_content')
    <!-- Секция с заголовком и приветствием -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Отзывы студентов</h1>
                <p class="lead text-body-secondary">Здесь собраны все отзывы от наших студентов по предметам. Наслаждайтесь!</p>
            </div>
        </div>
    </section>

    <!-- Секция с отзывами -->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <!-- Форма для фильтрации отзывов по предмету -->
            <form action="{{ Route('home')}}" method="GET">
                <div class="form-floating">
                    <select name="subject_id" id="subject_id" class="form-select">
                        <!-- Вывод опций выбора предмета -->
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select><br>
                    <label for="floatingPassword">Выберите предмет</label>
                    <!-- Кнопка для отправки формы и фильтрации -->
                    <button type="submit" class="btn btn-primary w-100 py-2"> Отсортировать </button>
                </div><br>
            </form>
            <hr>
            <!-- Вывод отзывов -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($subjects as $el)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h3> {{ $el->subject['name'] }} </h3><br>
                                <!-- Информация о пользователе, оставившем отзыв -->
                                <b> {{ $el->user['name'] }} {{ $el->user['Surname'] }} </b><br>
                                <b> Почта: {{ $el->user['email'] }} </b>
                                <!-- Текст отзыва -->
                                <p> {{ $el->message }} </p>
                                <!-- Дата создания отзыва -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-body-secondary">{{ $el->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
