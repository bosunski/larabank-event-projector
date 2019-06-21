<?php

namespace App\Http\Controllers;

use App\History;
use App\TransactionCount;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactionCounts = TransactionCount::orderByDesc('count')->get();

        $transactions = History::all();

        $transactions = (object) $transactions->map(function ($history) {
            $collect = collect(explode(':', $history->message))->map(function ($v) {
                return explode('-', $v)[0];
            });
            $collect->shift();

            $m = $collect->toArray();

            $data['name'] = $m[0];
            $data['type'] = $m[1];
            $data['amount'] = $m[2];
            $data['balance'] = $m[3];

            return (object) array_merge(['date' => $history->created_at->format('d/m/Y H:i:s')], $data);
        })->toArray();

//        dd($transactions);

        return view('transactions.index', compact('transactionCounts', 'transactions'));
    }
}
