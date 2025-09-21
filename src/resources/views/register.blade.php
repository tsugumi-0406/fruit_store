@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="main-inner">
    <h2 class="main-inner__title">商品登録</h2>
    <form action="/products/register" class="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">商品名</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="name" placeholder="商品名を入力" />
            </div>
            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">値段</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="number" name="price" placeholder="値段を入力" />
            </div>
            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">商品画像</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
                <input type="file" name="image" accept="image/*">ファイルを選択</input>
            </div>
            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">季節</span>
            <span class="form__label--required">必須</span>
            <span class="form__label--possible">複数選択可</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
                <div class="checkbox__wrapper">
                    <input type="checkbox" name="season_id[]" value="1"/>
                    <span>春</span>
                </div>
                <div class="checkbox__wrapper">
                    <input type="checkbox" name="season_id[]" value="2"/>
                    <span>夏</span>
                </div>
                <div class="checkbox__wrapper">
                    <input type="checkbox" name="season_id[]" value="3"/>
                    <span>秋</span>
                </div>
                <div class="checkbox__wrapper">
                    <input type="checkbox" name="season_id[]" value="4"/>
                    <span>冬</span>
                </div>
            </div>
            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">商品説明</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <textarea name="description" placeholder="商品の説明を入力"></textarea>
            </div>
            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
            </div>
          </div>
        </div>
        <div class="confirm-form__btn-inner">
            <input class="confirm-form__back-btn" type="submit" value="戻る" name="back">
            <input class="confirm-form__send-btn btn" type="submit" value="登録" name="send">
      </div>
    </form>
</div>

@endsection