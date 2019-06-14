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

        return view('transactions.index', compact('transactionCounts', 'transactions'));
    }
}
