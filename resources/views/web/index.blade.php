@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-2">
    @component('components.sidebar', ['categories' => $categories])
    @endcomponent
  </div>
  <div class="col-9">
    <h1>おすすめ店舗</h1>
    <div class="row">
      <div class="col-4">
        <a href="#">
          <img src="{{ asset('img/chestnut.jpg') }}" class="img-thumbnail">
        </a>
        <div class="row">
          <div class="col-12">
            <p class="tabelog-store-label mt-2">
              うどん きしめん 山田屋<br>
              <label>予算 : 1000円</label>
            </p>
          </div>
        </div>
      </div>
      <div class="col-4">
        <a href="#">
          <img src="{{ asset('img/persimmon.jpg') }}" class="img-thumbnail">
        </a>
        <div class="row">
          <div class="col-12">
            <p class="tabelog-store-label mt-2">
              味仙(台湾ラーメン) <br>
              <label>予算 : 1200円</label>
            </p>
          </div>
        </div>
      </div>
      <div class="col-4">
        <a href="#">
          <img src="{{ asset('img/persimmon.jpg') }}" class="img-thumbnail">
        </a>
        <div class="row">
          <div class="col-12">
            <p class="tabelog-store-label mt-2">
              煮込みうどん山本屋本店(和食) <br>
              <label>予算 : 900円</label>
            </p>
          </div>
        </div>
      </div>

    </div>

    <h1>新規店舗</h1>
    <div class="row">
      <div class="col-3">
        <a href="#">
          <img src="{{ asset('img/robot-vacuum-cleaner.jpg') }}" class="img-thumbnail">
        </a>
        <div class="row">
          <div class="col-12">
            <p class="tabelog-store-label mt-2">
              TOIRO
              <label>予算 : 900円</label>
            </p>
          </div>
        </div>
      </div>
      <div class="col-3">
        <a href="#">
          <img src="{{ asset('img/robot-vacuum-cleaner.jpg') }}" class="img-thumbnail">
        </a>
        <div class="row">
          <div class="col-12">
            <p class="tabelog-store-label mt-2">
              名古屋コーチン鉄板酒場とりしげ
              <label>予算 : 2000円</label>
            </p>
          </div>
        </div>
      </div>
      <div class="col-3">
        <a href="#">
          <img src="{{ asset('img/robot-vacuum-cleaner.jpg') }}" class="img-thumbnail">
        </a>
        <div class="row">
          <div class="col-12">
            <p class="tabelog-store-label mt-2">
              釜揚げスパゲッティ すぱじろう 中日ビル店
              <label>予算 : 1600円</label>
            </p>
          </div>
        </div>
      </div>
      <div class="col-3">
        <a href="#">
          <img src="{{ asset('img/robot-vacuum-cleaner.jpg') }}" class="img-thumbnail">
        </a>
        <div class="row">
          <div class="col-12">
            <p class="tabelog-store-label mt-2">
              DE CARNERO CASTE NAGOYA
              <label>予算 : 800円</label>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection