@extends('layout')

@section('title')О нас@endsection

@section('main_content')
    <!-- Секция с информацией о странице -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Отзывы студентов</h1>
                <p class="lead text-body-secondary">Здесь каждый студент вуза РТУ МИРЭА может оставить отзыв о любом предмете, деятельности преподавателей или просто поделиться интересным фактом!</p>
                
                <!-- Кнопка для написания отзыва -->
                <p>
                    <a href="/review" class="btn btn-primary my-2">Написать отзыв</a>
                </p>
            </div>
        </div>
    </section>
@endsection
