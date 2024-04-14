<!-- 店舗編集ページ -->
@extends('layouts.app')
 
@section('content')
<div class="container">
  <h1>店舗情報更新</h1>
 
  <form action="{{ route('stores.update',$store->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="store-name">店舗名</label>
      <input type="text" name="name" id="store-name" class="form-control" value="{{ $store->name }}">
    </div>
    <div class="form-group">
      <label for="store-description">店舗説明</label>
      <textarea name="description" id="store-description" class="form-control">{{ $store->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="store-price">価格</label>
      <input type="number" name="price" id="store-price" class="form-control" value="{{ $store->price }}">
    </div>
    <div class="form-group">
      <label for="store-hours">営業時間</label>
      <input type="text" name="hours" id="store-hours" class="form-control" value="{{ $store->hours }}">
    </div>
    <div class="form-group">
      <label for="store-code">郵便番号</label>
      <input type="text" name="code" id="store-code" class="form-control" value="{{ $store->code }}">
    </div>
    <div class="form-group">
      <label for="store-address">住所</label>
      <input type="text" name="address" id="store-address" class="form-control" value="{{ $store->address }}">
    </div>
    <div class="form-group">
      <label for="store-phone">電話番号</label>
      <input type="text" name="phone" id="store-phone" class="form-control" value="{{ $store->phone }}">
    </div>
    <div class="form-group">
      <label for="store-holiday">定休日</label>
      <input type="text" name="holiday" id="store-holiday" class="form-control" value="{{ $store->holiday }}">
    </div>
    <div class="form-group">
      <label for="store-category">カテゴリ</label>
      <select name="category_id" class="form-control" id="store-category">
        @foreach ($categories as $category)
          @if ($category->id == $store->category_id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-danger">更新</button>
  </form>
 
  <a href="{{ route('stores.index') }}">店舗一覧に戻る</a>
</div>
@endsection
