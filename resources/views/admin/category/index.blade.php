@extends("welcome")
@section("title", "Страница категорий товаров")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название категории</th>
                        <th scope="col">Функции</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route("admin.category.edit", $category)}}">Редактировать</a>
                            <a href="{{route("admin.category.show", $category)}}">Посмотреть товары</a>
                        </td>
                    </tr>
                    @empty
                        <tr><th colspan="3">Не создано ни одной категории <a href="{{route("admin.category.create")}}">Создать Новую</a></th></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
