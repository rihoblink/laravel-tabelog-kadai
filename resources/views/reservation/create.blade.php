@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
  <div class="row w-75">
    <div class="col-5 offset-1">
      @if ($store->image)
        <img src="{{ asset($store->image) }}" class="w-100 img-fluid">
      @else
        <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
      @endif
    </div>
    <div class="d-flex flex-column">
   
      <h1 class="">
        ああ{{$store->name}}
      </h1>
      <p class="">
        いいいい{{$store->description}}
      </p>
      <hr>
      <p class="">
        予算 : {{$store->price}}円
      </p>
      <hr>
    </div>
    <div>
      <label>予約日 : </label>
      <input type="date">
    </div>
    <div>
      <label>人数 : </label>
      <select name="people">
        <option value="">-</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
      </select> 人
    </div>
    <div class="btn tabelog-submit-button" data-bs-toggle="modal" data-bs-target="#buy-confirm-modal">予約を確定する</div>
    <div class="modal fade" id="buy-confirm-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">予約を確定しますか？</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="閉じる">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn tabelog-favorite-button border-dark text-dark" data-bs-dismiss="modal">閉じる</button>
            <button type="submit" class="btn tabelog-submit-button">予約</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection