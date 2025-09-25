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
    <form class="main-form" method="post" action="{{ route('products.update', ['productId' => $product->id]) }}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="main-content">
            <input type="hidden" name="id" value="{{ $product['id'] }}">
            <div class="main-content__image">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="product-card__content-image" name="image" width="100%">
            </div>
            <div class="main-content__centence">
                <div class="main-content__group">
                    <label for="" class="main-content__title-label">商品名</label>
                    <input type="text" class="main-content__input" value="{{ $product['name'] }}" name="name">
                        <div class="form__error">
                            @error('name')
                                {{ $errors->first('name') }}
                             @enderror
                        </div>
                </div>
                 <div class="main-content__group">
                    <label for="" class="main-content__title-label">値段</label>
                    <input type="text" class="main-content__input" value="{{ $product['price'] }}" name="price">
                    <div class="form__error">
                        @error('price')
                            {{ $errors->first('price') }}
                        @enderror
                    </div>
                </div>
                 <div class="main-content__group">
                    <label for="" class="main-content__title-label">季節</label>
                    <div class="checkbox__wrapper">
                    @foreach($seasons as $season)
                        <input type="checkbox" class="main-content__checkbox" value="{{ $season->id }}" name="season_id[]" {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>
                        <label class="main-content__season-label">{{ $season->name }}</label>
                    @endforeach
                    </div>
                    <div class="form__error">
                        @error('season_id')
                            {{ $errors->first('season_id') }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__input--text">
            <input type="file" accept="image/*" name="image">
            <div class="form__error">
                @error('image')
                    {{ $errors->first('image') }}
                @enderror
            </div>
        </div>
        <div class="main-content__group">
            <label for="" class="main-content__title-label">商品説明</label>
            <textarea class="main-content__input-textarea" name="description">{{ $product['description'] }}</textarea>
            <div class="form__error">
                @error('description')
                    {{ $errors->first('description') }}
                @enderror
            </div>
        </div>
        <div class="main-button">
            <input class="main-content__back-btn" type="submit" value="戻る" name="back">
            <input class="main-content__send-btn" type="submit" value="送信" name="send">
        </div>
    </form>
    <form action="{{ route('products.delete', $product->id) }}" class="form-delete" method="post">
        @method('DELETE')
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <button class="form-delete__btn" name="delete">
            <img src="{{ asset('storage/fruits-img/bunbougu_gomibako.png') }}" alt="ゴミ箱" height="20" width="20">
        </button>
    </form>
</div>
@endsection