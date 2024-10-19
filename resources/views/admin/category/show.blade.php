@extends("welcome")
@section("title", "Страница товаров - $category->name")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <h2>Категоря товаров {{$category->name}}</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название товара</th>
                        <th scope="col">Стоимость</th>
                        <th scope="col">Функции</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($category->products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{route("admin.product.show", $product)}}">Карточка</a>
                                <a href="{{route("admin.product.edit", $product)}}">Редактировать</a>
                            </td>
                        </tr>
                    @empty
                        <tr><th colspan="4">Нет товаров<a href="{{route("admin.category.product.create", $category)}}">Создать новый товар</a></th></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
