@extends('layouts.app')

@section('content')
<div class="">
  <div class="col-5 offset-1">
    @if ($store->image)
      <img src="{{ asset($store->image) }}" class="w-100 img-fluid">
    @else
      <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
    @endif
  </div>
  <div class="d-flex flex-column">
    <h1 class="">
      {{$store->name}}
    </h1>
    <p class="">
      {{$store->description}}
    </p>
    <hr>
    <p class="d-flex align-items-end">
      予算 : {{$store->price}}円
    </p>
    <hr>
    <!-- 営業時間 -->
    <p class="">
      営業時間 : {{$store->hours}}
    </p>
      <!-- 郵便番号 -->
    <p class="">
      〒{{$store->code}}
    </p>
    <!-- 住所 -->
    <p class="">
      住所 : {{$store->address}}
    </p>
    <!-- 電話番号 -->
    <p class="">
      TEL : {{$store->phone}}
    </p>
    <!-- 定休日 -->
    <p class="">
      定休日 : {{$store->holiday}}
    </p>
  </div>
  <div>
    <label for="date">予約日</label>
    <input type="date">
  </div>
</div>
@endsection