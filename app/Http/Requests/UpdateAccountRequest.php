<?php

namespace App\Http\Requests;

use App\Account;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'amount' => ['required', \Closure::fromCallable([$this, 'validateAmount'])],
        ];
    }

    public function adding()
    {
        return $this->has('addMoney');
    }

    public function validateAmount($attribute, $value, $fail)
    {
        if (!$this->adding()) {
            $account = $this->route('account');
            if ($account->balance < $value) {
                $fail("Insufficient funds to withdraw from $account->name ($account->account_number), please contact your financial institution or put another amount!");
            }
        }
    }
}
