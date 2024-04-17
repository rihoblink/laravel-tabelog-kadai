<!-- 店舗一覧ページ -->
@extends('layouts.app')
 
@section('content')
<div class="row">
  <div class="col-2">
  @component('components.sidebar', ['categories' => $categories, 'names' => $names])
  @endcomponent
  </div>
  <div class="col-9">

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
                <label>￥{{$store->price}}</label>
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