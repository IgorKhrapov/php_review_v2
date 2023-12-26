<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <!-- Метаинформация о странице -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>

    <!-- Подключение стилей Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="py-5 text-center container">
        <!-- Основная часть страницы с формой -->
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Вход</h1>

            <!-- Секция для вывода ошибок валидации -->
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

            <!-- Форма для входа -->
            <form method="post" action="/enter/check">
                @csrf <!-- Защита CSRF -->
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div><br>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="floatingPassword">Пароль</label>
                </div><br>
                <div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Вход</button>
                </div><br>
            </form>

            <!-- Форма для перехода на страницу регистрации -->
            <form method="post" action="/register">
                @csrf <!-- Защита CSRF -->
                <button class="btn btn-secondary w-100 py-2" type="submit">Регистрация</button>
                <p class="mt-5 mb-3 text-body-secondary">© 2023</p>
            </form>
        </main>
    </section>
</body>
</html>
