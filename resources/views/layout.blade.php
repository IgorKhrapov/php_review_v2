<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <!-- Метаинформация о странице -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Подключение стилей Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Навигационное меню -->
    <nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
        <div class="container">
            <!-- Бренд или логотип -->
            <a class="navbar-brand d-md-none" href="#">
                <svg class="bi" width="24" height="24"><use xlink:href="#aperture"></use></svg>
                Aperture
            </a>
            <!-- Кнопка для вызова offcanvas меню -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="#offcanvas" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- offcanvas меню -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="#offcanvas" aria-labelledby="#offcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="#offcanvasLabel">Aperture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- Навигационные ссылки -->
                    <ul class="navbar-nav flex-grow-1 justify-content-between">
                        <!-- Ссылки на разделы сайта -->
                        <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="bi" width="24" height="24"><use xlink:href="#aperture"></use></svg>
                        </a></li>
                        @can ('teacher-post') <li class="nav-item"><a class="nav-link" href="/home">Просмотр отзывов</a></li> @endcan
                        @can ('student-post') <li class="nav-item"><a class="nav-link" href="/review">Написать отзыв</a></li> @endcan
                        @can ('student-post') <li class="nav-item"><a class="nav-link" href="/myreview">Мои отзывы</a></li> @endcan
                        <li class="nav-item"><a class="nav-link" href="/about">О нас</a></li>
                        @can ('admin-post') <li class="nav-item"><a class="nav-link" href="/admin">Панель администрирования</a></li> @endcan
                        <li class="nav-item"><a class="nav-link" href="/logout">Выход</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="bi" width="24" height="24"><use xlink:href="#cart"></use></svg>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Основное содержимое страницы -->
    @yield('main_content')

    <!-- Подвал страницы -->
    <footer class="text-body-secondary py-5">
        <div class="container">
            <!-- Ссылки в подвале -->
            <p class="float-end mb-1">
                <a href="#">Вернуться наверх</a>
            </p>
            <p class="mb-1">Страница создана в учебных целях студентом РТУ МИРЭА</p>
            <p class="mb-0">Сайт вуза <a href="https://www.mirea.ru/" previewlistener="true">Переходи</a> или подпишись на меня <a href="https://vk.com/iann.wayne" previewlistener="true">Мой вк</a>.</p>
        </div>
    </footer>

    <!-- Скрипты Bootstrap (подключаются в конце страницы для ускорения загрузки) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
