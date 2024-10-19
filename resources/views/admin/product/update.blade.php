@extends("welcome")
@section("title", "Страница редактирование товара {$product->category->name}")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <h2>Редактирование товара для категории{{$product->category->name}}</h2>
                <form action="{{route("admin.product.update", $product)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    @include("components.Input", ["value" => $product->name, "type"=>"text", "label"=>"Наименование категории", "name" => "name", "placeholder" => "Введите название категории"])
                    @include("components.Input", ["value" => $product->price, "type"=>"number", "label"=>"Стоимость", "name" => "price", "placeholder" => "Введите стоимость", "step"=>0.01,"min"=>0])
                    @include("components.Input", ["type"=>"file", "label"=>"Фотография", "name" => "image"])
                    @include("components.Input", ["value" => $product->description, "type"=>"text", "label"=>"Описание товара", "name" => "description", "placeholder" => "Введите описание"])
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
