@extends("welcome")
@section("title", "Страница категорий товаров")
@section("content")
    @include('product.basket')
    <div class="container">
        <div class="d-flex align-items-start w-100">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @forelse($categories as $category)
                    <button
                        class="nav-link"
                        id="v-{{$category->id}}"
                        data-bs-toggle="pill"
                        data-bs-target="#v-{{$category->id}}-tab"
                        type="button"
                        role="tab"
                        aria-controls="v-pills-settings"
                        aria-selected="false">{{$category->name}}</button>
                @empty
                @endforelse
            </div>
            <div class="tab-content w-100" id="v-pills-tabContent">
                @forelse($categories as $category)
                    <div
                        class="tab-pane fade"
                        id="v-{{$category->id}}-tab"
                        role="tabpanel"
                        aria-labelledby="v-{{$category->id}}"
                        tabindex="0">
                        <div class="row w-100">
                            @forelse($category->products as $product)
                                <div class="col-4 col-md-2">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="{{$product->name}}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$product->name}}</h5>
                                            <p class="card-text">{{$product->description}}</p>
                                            <a href="#" class="btn btn-light">{{$product->price}}</a>
                                            <a href="#" class="btn btn-primary btn-sm"
                                               data-product="{{ $product->id }}">Добавить в корзину</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-warning">В данной категории нет товаров</div>
                            @endforelse
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection

<script>
    let products = localStorage.getItem('products')
    if (products) {
        products = JSON.parse(products)
    } else products = {};

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('[data-product]').forEach(el => {
            el.addEventListener('click', function () {
                if (products[el.dataset.product]) {
                    products[el.dataset.product]++
                } else products[el.dataset.product] = 1
                localStorage.setItem('products', JSON.stringify(products))

                renderToBasket()
            })
        });

        function renderToBasket() {
            let productHTML = document.querySelector("#products");
            fetch('/api/basket', {
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                method: 'POST',
                body: JSON.stringify({"products": products})
            })
                .then(response => response.json())
                .then(body => {
                    let context = '';
                    let summa = 0;
                    body.forEach(item => {
                        summa += (item.price*products[item.id]);
                        context += `<li class="list-group-item row">
                                        <div class='small fw-bold'>Наименование товара</div>
                                        <div>${item.name}</div>
                                        <div class='small fw-bold'>Стоимость товара за штуку</div>
                                        <div>${item.price}</div>
                                        <div class='small fw-bold'>Количество/Общая стоимость</div>
                                        <div class="input-group">
                                            <input type="number"
                                                    onkeyup="setProductCount(${item.id}, this.value, ${item.price})"
                                                    onchange="setProductCount(${item.id}, this.value, ${item.price})" min='0' step='1'
                                                    class="form-control w-50" placeholder="Количество" value='${products[item.id]}'>
                                            <span class="input-group-text w-50" style='justify-content: end' id='product_prices_${item.id}'>` + (item.price*products[item.id])+ `</span>
                                        </div>
                                    </li>`
                    })
                    productHTML.innerHTML = context
                    document.querySelector('#all_price').innerHTML = 'Общая сумма: ' + summa
                })
        }

        renderToBasket()
    });

    function setProductCount(productId, val, price) {
        val = parseInt(val);
        price = parseInt(price)
        if (val <= 0 || isNaN(val)) {
            delete products[productId];
            let el = document.querySelector('#product_prices_' + productId)
            el.parentElement.parentElement.remove();
        } else {
            products[productId] = val;
            document.querySelector('#product_prices_' + productId).innerHTML = (price * val);
        }
        localStorage.setItem('products', JSON.stringify(products))

        document.querySelectorAll('#product_prices_*').forEach(el => {

        })
    }
</script>
