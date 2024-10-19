@extends("welcome")
@section("title", "Страница создания товара в категории $category->name")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <h2>Создание товара для категории{{$category->name}}</h2>
                <form action="{{route("admin.category.product.store", $category)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include("components.Input", ["type"=>"text", "label"=>"Наименование категории", "name" => "name", "placeholder" => "Введите название категории"])
                    @include("components.Input", ["type"=>"number", "label"=>"Стоимость", "name" => "price", "placeholder" => "Введите стоимость", "step"=>0.01,"min"=>0])
                    @include("components.Input", ["type"=>"file", "label"=>"Фотография", "name" => "image"])
                    @include("components.Input", ["type"=>"text", "label"=>"Описание товара", "name" => "description", "placeholder" => "Введите описание"])
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
