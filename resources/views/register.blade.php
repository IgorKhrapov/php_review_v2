<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <!-- Метаинформация о странице -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <!-- Подключение стилей Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="py-5 text-center container">
        <!-- Основная часть страницы с формой регистрации -->
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

            <!-- Секция для вывода ошибок валидации -->
            <section class="py-5 text-start container">
                @if($errors->any())
                    <!-- Вывод ошибок валидации -->
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif      
            </section>

            <!-- Форма для регистрации -->
            <form method="post" action="/register/check">
                @csrf <!-- Защита CSRF -->
                <div class="form-floating">
                    <input type="name" name="name" class="form-control" id="name" placeholder="Name">
                    <label for="floatingInput">Имя</label>
                </div><br>
                <div class="form-floating">
                    <input type="surname" name="surname" class="form-control" id="surname" placeholder="Surname">
                    <label for="floatingInput">Фамилия</label>
                </div><br>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div><br>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="floatingPassword">Пароль</label>
                </div><br>
                <div class="form-floating">
                    <select name="role_id" id="role_id" class="form-select">
                        <!-- Выбор роли пользователя -->
                        <option value="1"> Студент </option>
                        <option value="2"> Преподаватель </option>
                        <option value="3"> Админ </option>
                    </select>
                    <label for="floatingInput">Выберите роль</label>
                </div><br>
                <button class="btn btn-primary w-100 py-2" type="submit">Зарегистрироваться</button>
                <p class="mt-5 mb-3 text-body-secondary">© 2023</p>
            </form>
        </main>
    </section>
</body>
</html>
