@extends('layouts.app')

@section('content')
    @if($errors->count() > 0)
        <div class="py-8 mb-2 flex items-center justify-center rounded-sm bg-grey-darkest border-grey-darker text-grey-light">
            Error: Please make sure all fields are filled correctly!
        </div>
    @endif

    @include('accounts.partials.create-form')
@endsection
