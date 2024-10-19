@extends("welcome")
@section("title", "Страница категорий товаров")
@section("content")
    @include("components.Input", ["type"=>"text", "label"=>"Тест лабле", "name" => "vasya", "placeholder" => "Введите текст"])
@endsection
