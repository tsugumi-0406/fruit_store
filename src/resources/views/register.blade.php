  @extends('layouts.app')

  @section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  @endsection

  @section('content')
  <div class="main-inner">
      <h2 class="main-inner__title">商品登録</h2>
      <form action="{{ route('images.store') }}" class="form" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form__group">
            <div class="form__group-title">
              <span class="form__label-item">商品名</span>
              <span class="form__label-required">必須</span>
            </div>
            <div class="form__group-content">
              <div class="form__input-text">
                <input type="text" name="name" placeholder="商品名を入力" class="form__input-name">
              </div>
              <div class="form__error-name">
                @error('name')
                {{ $errors->first('name') }}
                @enderror
              </div>
            </div>
          </div>

          <div class="form__group">
            <div class="form__group-title">
              <span class="form__label-item">値段</span>
              <span class="form__label-required">必須</span>
            </div>
            <div class="form__group-content">
              <div class="form__input-text">
                <input type="text" name="price" placeholder="値段を入力" class="form__input-price"/>
              </div>
              <div class="form__error">
                @error('price')
                {{ $errors->first('price') }}
                @enderror
              </div>
            </div>
          </div>

          <div class="form__group">
            <div class="form__group-title">
              <span class="form__label-item">商品画像</span>
              <span class="form__label-required">必須</span>
            </div>
            <div class="form__group-content">
              <div class="form__input-text">
                  <input type="file" name="image" accept="image/*" class="form__input-image">
              </div>
              <div class="form__error">
                @error('image')
                {{ $errors->first('image') }}
                @enderror
              </div>
            </div>
          </div>

          <div class="form__group">
            <div class="form__group-title">
              <span class="form__label-item">季節</span>
              <span class="form__label-required">必須</span>
              <span class="form__label-possible">複数選択可</span>
            </div>
            <div class="form__group-content">
              <div class="form__input-text">
                  <div class="checkbox__wrapper">
                      <input type="checkbox" name="season_id[]" value="1" class="form__input-checkbox">
                      <label class="form__label-checkbox">春</label>
                  </div>
                  <div class="checkbox__wrapper">
                      <input type="checkbox" name="season_id[]" value="2" class="form__input-checkbox">
                      <label class="form__label-checkbox">夏</label>
                  </div>
                  <div class="checkbox__wrapper">
                      <input type="checkbox" name="season_id[]" value="3" class="form__input-checkbox">
                      <label class="form__label-checkbox">秋</label>
                  </div>
                  <div class="checkbox__wrapper">
                      <input type="checkbox" name="season_id[]" value="4" class="form__input-checkbox">
                      <label class="form__label-checkbox">冬</label>
                  </div>
              </div>
              <div class="form__error">
                @error('season_id')
                {{ $errors->first('season_id') }}
                @enderror
              </div>
            </div>
          </div>

          <div class="form__group">
            <div class="form__group-title">
              <span class="form__label-item">商品説明</span>
              <span class="form__label-required">必須</span>
            </div>
            <div class="form__group-content">
              <div class="form__input-text">
                <textarea name="description" placeholder="商品の説明を入力"  class="form__input-description"></textarea>
              </div>
              <div class="form__error">
                @error('description')
                {{ $errors->first('description') }}
                @enderror
              </div>
            </div>
          </div>
          <div class="confirm-form__btn-inner">
              <input class="confirm-form__back-btn" type="submit" value="戻る" name="back">
              <input class="confirm-form__send-btn" type="submit" value="登録" name="send">
        </div>
      </form>
  </div>

  @endsection