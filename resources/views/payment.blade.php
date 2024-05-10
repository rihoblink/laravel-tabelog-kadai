<h3>決済デモ</h3>
<form action="{{ route('payment.createCharge') }}" method="post">
  @csrf
  <script
    src="https://checkout.pay.jp/"
    class="payjp-button"
    data-key="{{ config('payjp.public_key') }}"
    data-text="カード情報を入力"
    data-submit-text="カードを登録する"></script>
</form>