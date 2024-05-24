<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public static function setCustomer($token, $user)
    {
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));

        //Stripe上に顧客情報をtokenを使用することで保存
        try {
            $customer = \Stripe\Customer::create([
                'card' => $token,
                'name' => $user->name,
                'description' => $user->id
            ]);
        } catch(\Stripe\Exception\CardException $e) {
            return false;
        }

        $targetCustomer = null;
            if (isset($customer->id)) {
                $targetCustomer = User::find(Auth::id());//要するに当該顧客のデータをUserテーブルから引っ張りたい
                $targetCustomer->stripe_id = $customer->id;
                $targetCustomer->update();
                return true;
            }
            return false;
        }

        public static function updateCustomer($token, $user)
        {
            \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));

            try {
                $customer = \Stripe\Customer::retrieve($user->stripe_id);
                $card = $customer->sources->create(['source' => $token]);

                if (isset($customer)) {
                    $customer->default_source = $card["id"];
                    $customer->save();
                    return true;
                }

            } catch(\Stripe\Exception\CardException $e) {
                return false;
            }
            return true;
        }

        protected static function getDefaultcard($user)
        {
            \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));

            $default_card = null;

            if (!is_null($user->stripe_id)) {
                $customer = \Stripe\Customer::retrieve($user->stripe_id);

                if (isset($customer['default_source']) && $customer['default_source']) {

                    $card = $customer->sources->data[0];
                    $default_card = [
                        'number' => str_repeat('*', 8) . $card->last4,
                        'brand' => $card->brand,
                        'exp_month' => $card->exp_month,
                        'exp_year' => $card->exp_year,
                        'name' => $card->name,
                        'id' => $card->id,
                    ];
                }
            }
            return $default_card;
        }
        
        protected static function deleteCard($user)
        {
            \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));
            $customer = \Stripe\Customer::retrieve($user->stripe_id);
            $card = $customer->sources->data[0];

            var_dump($card,"カード");
            /* card情報が存在していれば削除 */
            if ($card) {
            \Stripe\Customer::deleteSource(
                $user->stripe_id,
                $card->id
            );
            return true;
        }
        return false;
    }
}
