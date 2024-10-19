@extends("welcome")
@section("title", "Страница товара {$product->name}")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card w-100">
                    <img src="/storage/{{$product->image}}" class="card-img-top" style="width:100%; height:150px;" alt="{{$product->name}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Категория: {{$product->category->name}}</li>
                        <li class="list-group-item">Цена: {{round($product->price, 2)}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{route("admin.product.edit", $product)}}" class="card-link">Редактировать товар</a>
                        <a href="#" class="card-link">Удалить товар</a>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
