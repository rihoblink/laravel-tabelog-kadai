@extends('layouts.app')
 
@section('content')
<div class="container  d-flex justify-content-center mt-3">
  <div class="w-75">
    <h1>お気に入り店舗</h1>
 
    <hr>
 
    <div class="row">
      @foreach ($favorite_stores as $favorite_store)
      <div class="col-md-7 mt-2">
        <div class="d-inline-flex">
          <a href="{{ route('stores.show', $favorite_store->id) }}" class="w-25">
          @if ($favorite_store->image !== "")
            <img src="{{ asset($favorite_store->image) }}" class="img-fluid w-100">
          @else
            <img src="{{ asset('img/dummy.png') }}" class="img-fluid w-100">
          @endif
          </a>
          <div class="container mt-3">
            <h5 class="w-100 tabelog-favorite-item-text">{{ $favorite_store->name }}</h5>
            <h6 class="w-100 tabelog-favorite-item-text">&yen;{{ $favorite_store->price }}</h6>
          </div>
        </div>
      </div>
      <div class="col-md-2 d-flex align-items-center justify-content-end">
        <a href="{{ route('favorites.destroy', $favorite_store->id) }}" class="tabelog-favorite-item-delete" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form{{$favorite_store->id}}').submit();">
          削除
        </a>
        <form id="favorites-destroy-form{{$favorite_store->id}}" action="{{ route('favorites.destroy', $favorite_store->id) }}" method="POST" class="d-none">
          @csrf
          @method('DELETE')
        </form>
      </div>
      @endforeach
    </div>
 
    <hr>
    </div>
  </div>
@endsection