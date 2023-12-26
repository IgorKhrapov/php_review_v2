<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Contact;
use App\Models\Role;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    // Метод для отображения страницы входа
    public function enter() {
        // Проверка авторизации пользователя
        if (auth::check()){
            return view('enter'); // Если пользователь уже авторизован, показываем страницу входа
        }
        
        return view('enter'); // Иначе также показываем страницу входа
    }

    // Метод для проверки данных при входе
    public function enter_check(Request $request) {
        // Валидация данных формы входа
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'password' => 'required|min:8|max:100',
        ]);

        $fromFields = $request->only(['email', 'password']);

        // Попытка аутентификации пользователя
        if (auth::attempt($valid)) {
            return redirect()->route('about'); // При успешной авторизации перенаправляем на домашнюю страницу
        }

        return redirect(route('enter'))->withErrors([
            'email' => 'Не удалось авторизоваться' // Если не удалось авторизоваться, возвращаем на страницу входа с ошибкой
        ]);
    }

    // Метод для отображения страницы регистрации
    public function register() {
        return view('register');
    }

    // Метод для обработки данных при регистрации
    public function register_check(Request $request) {
        // Валидация данных формы регистрации
        $validateFields = $request->validate([
            'name' => 'required|min:4|max:100',
            'surname' => 'required|min:4|max:100',
            'email' => 'required|min:4|max:100',
            'password' => 'required|min:8|max:100',
            'role_id' => 'required|min:0|max:5',
        ]);

        // Создание нового пользователя
        $user = User::create($validateFields);

        return redirect()->route('enter'); // Перенаправление на страницу входа после успешной регистрации
    }

    // Метод для отображения домашней страницы
    public function home(ProductFilter $request) {
        // Получение данных для отображения на домашней странице
        $home = Contact::all();
        $user = auth()->User();
        $subject = new Subject();
        $subjects = Contact::filter($request)->paginate(9);
        $categories = Subject::all();

        return view('home', compact(['categories', 'subjects', 'user', 'home', 'subject']));
    }

    // Метод для отображения страницы "О нас"
    public function about() {
        return view('about');
    }

    // Метод для отображения страницы отзывов
    public function review() {
        $review = new Contact();
        return view('review', ['reviews' => $review->all()]);
    }

    // Метод для отображения страницы с отзывами пользователя
    public function myreview() {
        $review = new Contact();
        $user = auth()->User();
        $subject = new Subject();
        return view('myreview', ['users' => $user], ['reviews' => $review->all()], ['sub' => $subject]);
    }

    // Метод для обработки данных при отправке отзыва
    public function review_check(Request $request, User $user) {
        // Валидация данных формы отзыва
        $valid = $request->validate([
            'subject_id' => 'required|min:1|max:5',
        ]);
        
        $review = new Contact();

        // Сохранение отзыва в базе данных
        $review->subject_id = $request->subject_id;
        $review->message = $request->input('message');
        $review->user_id = $user = Auth::user()->id;

        $review->save();

        return redirect()->route('review'); // Перенаправление на страницу отзывов после сохранения отзыва
    }

    // Методы для управления отзывами пользователя
    public function update($id) {
        $contact = new Contact();
        $user = auth()->User();
        $subject = new Subject();
        return view('update', ['data' => $contact->find($id)], ['users' => $user], ['sub' => $subject]);
    }

    public function updateSubmit($id, Request $request, User $user) {
        $review = Contact::find($id);
        $review->subject_id = $request->subject_id;
        $review->message = $request->input('message');
        $review->user_id = $user = Auth::user()->id;

        $review->save();

        return redirect()->route('myreview'); 
    }

    public function delete($id) {
        Contact::find($id)->delete();
        return redirect()->route('myreview'); 
    }

    // Метод для удаления пользователя из административной панели
    public function deleteUser($id) {
        User::find($id)->delete();
        return redirect()->route('admin'); 
    }

    // Метод для отображения административной панели
    public function admin() {
        $user = new User();
        $role = new Role();
        return view('admin', ['users' => $user->all()], ['roles' => $role]);
    }
}
