@extends('layout')

@section('title')Мои отзывы@endsection

@section('main_content')

    <!-- Секция с заголовком и приветствием -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <!-- Отображение приветствия пользователя -->
                <h3> Добрый день, {{ $users->name }} {{ $users->Surname }}! </h3>
            </div>
        </div>
    </section>

    <!-- Секция с отзывами -->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($reviews as $el)
                    @if ($el->user_id == $users->id)
                    <!-- Проверка, чтобы отобразить только отзывы, принадлежащие текущему пользователю -->
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <!-- Отображение данных об отзыве -->
                                <h3> {{ $el->subject['name']}} </h3><br>
                                <b> {{ $el->user['name'] }} {{ $el->user['Surname'] }} </b><br>
                                <b> Почта: {{ $el->user['email'] }} </b>
                                <p> {{ $el->message }} </p>
                                
                                <!-- Кнопки для редактирования и удаления отзыва -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">                                      
                                        <a href="{{ route('update', $el->id) }}"><button type="button" class="btn btn-sm btn-outline-primary">Редактировать</button></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('delete', $el->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button></a>
                                    </div>
                                    <small class="text-body-secondary">{{ $el->updated_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @can ('admin-post')
    <!-- Дополнительная секция с отзывами для администратора -->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($reviews as $el)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <!-- Отображение данных об отзыве -->
                                <h3> {{ $el->subject['name']}} </h3><br>
                                <b> {{ $el->user['name'] }} {{ $el->user['Surname'] }} </b><br>
                                <b> Почта: {{ $el->user['email'] }} </b>
                                <p> {{ $el->message }} </p>
                                
                                <!-- Кнопки для редактирования и удаления отзыва -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">                                      
                                        <a href="{{ route('update', $el->id) }}"><button type="button" class="btn btn-sm btn-outline-primary">Редактировать</button></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('delete', $el->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button></a>
                                    </div>
                                    <small class="text-body-secondary">{{ $el->updated_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endcan
@endsection
