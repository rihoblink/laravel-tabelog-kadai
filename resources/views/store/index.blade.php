<!-- 店舗一覧ページ -->
@extends('layouts.app')
 
@section('content')
<div class="row">
  <div class="col-2">
  @component('components.sidebar', ['categories' => $categories, 'names' => $names])
  @endcomponent
  </div>
  <div class="col-9">
  
    <div class="container">
      @if ($keyword !== null)
        <a href="{{ route('stores.index') }}">トップ</a> > 商品一覧
        <h1>"{{ $keyword }}"の検索結果{{$total_count}}件</h1>
      @endif
    </div>
    <div>
      並び替え
        @sortablelink('price', '価格')
    </div>


    <div class="container mt-4">
      <div class="row w-100">
        @foreach($stores as $store)
        <div class="col-3">
          <a href="{{route('stores.show', $store)}}">
            <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
          </a>
          <div class="row">
            <div class="col-12">
              <p class="tabelog-store-label mt-2">
                {{$store->name}}<br>
                <label>予算 : {{$store->price}}円</label>
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    {{ $stores->appends(request()->query())->links() }}
  </div>
</div>
@endsection