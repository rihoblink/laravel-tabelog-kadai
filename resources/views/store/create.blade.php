<!-- 店舗作成ページ -->
@extends('layouts.app')
 
@section('content')
<div class="container">
  <h1>新しい店舗を追加</h1>
 
  <form action="{{ route('stores.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="store-name">店舗名</label>
      <input type="text" name="name" id="store-name" class="form-control">
    </div>
    <div class="form-group">
      <label for="store-description">店舗説明</label>
      <textarea name="description" id="store-description" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="store-price">価格</label>
      <input type="number" name="price" id="store-price" class="form-control">
    </div>
    <div class="form-group">
      <label for="store-hours">営業時間</label>
      <input type="text" name="hours" id="store-hours" class="form-control">
    </div>
    <div class="form-group">
      <label for="store-code">郵便番号</label>
      <input type="text" name="code" id="store-code" class="form-control">
    </div>
    <div class="form-group">
      <label for="store-address">住所</label>
      <input type="text" name="address" id="store-address" class="form-control">
    </div>
    <div class="form-group">
      <label for="store-phone">電話番号</label>
      <input type="text" name="phone" id="store-phone" class="form-control">
    </div>
    <div class="form-group">
      <label for="store-holiday">定休日</label>
      <input type="text" name="holiday" id="store-holiday" class="form-control">
    </div>
    <div class="form-group">
      <label for="store-category">カテゴリ</label>
        <select name="category_id" class="form-control" id="store-category">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">店舗を登録</button>
  </form>
 
  <a href="{{ route('stores.index') }}">店舗一覧に戻る</a>
</div>
@endsection