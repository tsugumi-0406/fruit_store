@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<div class="main-inner">
    <h2 class="main-title">
        <span class="main-title__beforepage">商品一覧</span>
        <span class="main-title__nowpage">>{{ $product['name'] }}</span>
    </h2>
    <form action="{{ route('products.update', $product->id) }}" class="main-form" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="main-content">
            <input type="hidden" name="id" value="{{ $product['id'] }}">
            <div class="main-content__image">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="product-card__content-image" name="image">
            </div>
            <div class="main-content__centence">
                <div class="main-content__group">
                    <label for="" class="main-content__title-label">商品名</label>
                    <input type="text" class="main-content__input" value="{{ $product['name'] }}" name="name">
                    @error('name')
                    {{ $errors->first('name') }}
                     @enderror
                </div>
                 <div class="main-content__group">
                    <label for="" class="main-content__title-label">値段</label>
                    <input type="text" class="main-content__input" value="{{ $product['price'] }}" name="price">
                    @error('price')
                    {{ $errors->first('price') }}
                    @enderror
                </div>
                 <div class="main-content__group">
                    <label for="" class="main-content__title-label">季節</label>
                    @foreach($seasons as $season)
                    <div class="checkbox__wrapper">
                    <input type="checkbox" class="main-content__checkbox" value="{{ $season->id }}" name="season_id[]" {{ $product->seasons->contains($season->id) ? 'checked' : '' }}><span>{{ $season->name }}</span>
                    </div>
                    @endforeach
                    @error('season_id')
                    {{ $errors->first('season_id') }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__input--text">
            <input type="file" accept="image/*" name="image">
            @error('image')
            {{ $errors->first('image') }}
            @enderror
        </div>
        <div class="main-content__group">
            <label for="" class="main-content__title-label">商品説明</label>
            <textarea class="main-content__input" name="description">{{ $product['description'] }}</textarea>
            @error('description')
            {{ $errors->first('description') }}
            @enderror
        </div>
        <div class="main-button">
            <input class="main-content__back-btn" type="submit" value="戻る" name="back">
            <input class="main-content__send-btn btn" type="submit" value="送信" name="send">
        </div>
    </form>
    <form action="" class="form-delete">
        @csrf
        <input type="submit" class="form-delete__btn" value="消去" name="delete">
    </form>
</div>
@endsection