@extends("welcome")
@section("title", "Страница категорий товаров")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <h2>Создание категории</h2>
                <form action="{{route("admin.category.store")}}" method="post">
                    @csrf
                    @include("components.Input", ["type"=>"text", "label"=>"Наименование категории", "name" => "name", "placeholder" => "Введите название категории"])
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
