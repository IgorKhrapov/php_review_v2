@extends('layout')

@section('title')Панель администрирования@endsection

@section('main_content')
    <!-- Секция с отображением пользователей в админ-панели -->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!-- Цикл для вывода информации о пользователях -->
                @foreach ($users as $el)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <!-- Имя и фамилия пользователя -->
                                <h3> {{ $el->name }} {{ $el->Surname }} </h3><br>
                                <!-- Почтовый адрес пользователя -->
                                <b> Почта: {{ $el->email }} </b><br>
                                <!-- Роль пользователя -->
                                <p> {{ $el->role['name'] }} </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Кнопка "Удалить" для каждого пользователя -->
                                        <a href="{{ route('delete-user', $el->id) }}"><button type="button" class="btn btn-sm btn-outline-primary">Удалить</button></a>
                                    </div>
                                    <!-- Дата обновления информации о пользователе -->
                                    <small class="text-body-secondary">{{ $el->updated_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
