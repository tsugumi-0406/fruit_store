@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="page-top">
    <h2 class="main__title">商品一覧</h2>
    <form action="" class="add-form">
        <button class="add-form__submit">+商品を追加</button>
    </form>
</div>
<form action="" class="search-form">
    <input type="text" class="search-form__text" placeholder="商品名で検索">
    <button class="search-form__submit">検索</button>
    <label for="sortSelect" class="search-form__sort-label">並べ替え: </label>
    <select id="sortSelect" class="search-form__sort-select">
        <option value="price-asc" class="search-form__sort-option">高い順に表示</option>
        <option value="price-desc" class="search-form__sort-option">低い順に表示</option>
    </select>
</form>

@foreach($products as $product)
<div class="product-card">
    <img src="{{ asset('storage/' . $product->image) }}" alt="" class="product-card__content-image">
    <div class="product-card__content">
        <p class="product-card__content-name">{{ $product['name'] }}</p>
        <p class="product-card__content-price">{{ $product['price'] }}</p>
    </div>
</div>
@endforeach



@endsection