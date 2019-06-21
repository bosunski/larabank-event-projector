@extends('layouts.app')

@section('content')
    <h1 class="text-xl leading-none tracking-wide text-grey-darker mb-2">
        Transaction counts
    </h1>
    <div class="bg-grey-darkest rounded-sm p-4 text-grey-light">
        <table class="w-full">
            <thead>
            <tr>
                <th class="text-left text-grey-light text-sm uppercase font-bold p-2 bg-grey-darker rounded-l-sm">Name</th>
                <th class="text-right text-grey-light text-sm uppercase font-bold p-2 bg-grey-darker rounded-r-sm">Type</th>
                <th class="text-right text-grey-light text-sm uppercase font-bold p-2 bg-grey-darker rounded-r-sm">Amount</th>
                <th class="text-right text-grey-light text-sm uppercase font-bold p-2 bg-grey-darker rounded-r-sm">Balance</th>
                <th class="text-right text-grey-light text-sm uppercase font-bold p-2 bg-grey-darker rounded-r-sm">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td class="p-2 border-b border-grey-darker">{{ $transaction->name }}</td>
                    <td class="p-2 text-right border-b border-grey-darker">{{ $transaction->type }}</td>
                    <td class="p-2 text-right border-b border-grey-darker">{{ $transaction->amount }}</td>
                    <td class="p-2 text-right border-b border-grey-darker">{{ $transaction->balance }}</td>
                    <td class="p-2 text-right border-b border-grey-darker">{{ $transaction->date }}</td>
{{--                    <td class="p-2 border-b border-grey-darker text-right">{{ $transactionCount->count }}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
