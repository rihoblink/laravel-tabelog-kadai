@extends('layouts.app')
 
 @section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <span>
        <a href="{{ route('mypage') }}">マイページ</a> > <a href="{{ route('mypage.reservation_history') }}">予約履歴</a> > 予約履歴詳細
      </span>
 
      <h1 class="mt-3">予約履歴詳細</h1>
 
      <h4 class="mt-3">ご予約情報</h4>
 
      <hr>
 
      <div class="row">
        <div class="col-5 mt-2">
          予約番号
        </div>
      <div class="col-7 mt-2">
        {{ $reservation_info->code }}
      </div>
 
      <div class="col-5 mt-2">
        予約日時
      </div>
      <div class="col-7 mt-2">
        {{ $reservation_info->updated_at }}
      </div>
 
      <hr>
 
      <div class="row">
        @foreach ($reservation_contents as $store)
          <div class="col-md-5 mt-2">
            <a href="{{route('stores.show', $store->id)}}" class="ml-4">
              @if ($store->options->image)
                <img src="{{ asset($store->options->image) }}" class="img-fluid w-75">
              @else
                <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-75">
              @endif
            </a>
          </div>
          <div class="col-md-7 mt-2">
            <div class="flex-column">
              <p class="mt-4">{{$store->name}}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
 
@endsection
