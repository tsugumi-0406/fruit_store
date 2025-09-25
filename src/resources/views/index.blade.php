@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="page-top">
    <h2 class="main__title">商品一覧</h2>
    <form action="/products/register" class="add-form" method="get">
        @csrf
        <button class="add-form__submit">+商品を追加</button>
    </form>
</div>
<div class="main-content">
    <form action="/products/search" class="search-form" method="get">
        @csrf
        <input type="text" class="search-form__text" placeholder="商品名で検索" name="keyword">
        <button class="search-form__submit">検索</button>
        <label for="sortSelect" class="search-form__sort-label">価格順で表示: </label>
        <select id="sortSelect" class="search-form__sort-select" name="sort" onchange="this.form.submit()">
            <option>価格で並べ替え</option>
            <option value="price-desc" class="search-form__sort-option" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>高い順に表示</option>
            <option value="price-asc" class="search-form__sort-option" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>低い順に表示</option>
        </select>
        @switch( $sortType)
            @case ('price-desc')
                <div class="sort-option__tag">
                高い順に表示
                <button class="search-form__reset-submit" name="sort">×</button>
                </div>
            @break
            @case ('price-asc')
                <div class="sort-option__tag">
                低い順に表示
                <button class="search-form__reset-submit" name="sort">×</button>
                </div>
            @break
            @default
            <div class="sort-option__tag-none">
            </div>
        @endswitch
          
    </form>
    <div class="main-content__product">
        @foreach($products as $product)
        <div class="product-card">
            <form action="{{ route('products.detail',  ['productId' => $product->id]) }}" method="get">
                <button class="product-card__button">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="" class="product-card__content-image" width="100%" class="product-card__image">
                    <div class="product-card__content">
                        <p class="product-card__content-name">{{ $product['name'] }}</p>
                        <p class="product-card__content-price">¥{{ $product['price'] }}</p>
                    </div>
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
<div class="pagination">
    {{ $products->appends(request()->query())->links() }}
</div>
@endsection 