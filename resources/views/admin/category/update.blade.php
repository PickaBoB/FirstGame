@extends("welcome")
@section("title", "Страница категорий товаров")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <h2>Редактирования категории {{$category->name}}</h2>
                <form action="{{route("admin.category.update",$category)}}" method="post">
                    @csrf
                    @method("put")
                    @include("components.Input",
                    [
                        "type"=>"text",
                        "label"=>"Наименование категории",
                        "name" => "name",
                        "placeholder" => "Введите название категории",
                        "value"=>$category->name
                    ])
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
