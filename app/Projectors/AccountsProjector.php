<?php

namespace App\Projectors;

use App\Account;
use App\Events\AccountCreated;
use App\Events\AccountDeleted;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use App\History;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;

class AccountsProjector implements Projector
{
    use ProjectsEvents;

    public function onAccountCreated(AccountCreated $event)
    {
        Account::create($event->accountAttributes);
    }

    public function onMoneyAdded(MoneyAdded $event)
    {
        $account = Account::uuid($event->accountUuid);

        $account->balance += $event->amount;

        $message = "Name: $account->name - Type: Deposit - Amount: $event->amount - Balance: $account->balance";

        if ($account->balance >= 0) {
            $this->broke_mail_sent = false;
        }

        if ($account->save()) {
            History::create(['message' => $message]);
        }
    }

    public function onMoneySubtracted(MoneySubtracted $event)
    {
        $account = Account::uuid($event->accountUuid);

        $account->balance -= $event->amount;

        $message = "Name: $account->name - Type: Withdraw - Amount: $event->amount - Balance: $account->balance";

        if ($account->save()) {
            History::create(['message' => $message]);
        }
    }

    public function onAccountDeleted(AccountDeleted $event)
    {
        $account = Account::uuid($event->accountUuid);

        $account->delete();
    }

    public function resetState()
    {
        Account::truncate();
    }
}
