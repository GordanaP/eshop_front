@extends('layouts.app')

@section('content')

    <form action="{{ route('addresses.store') }}" method="POST">

        @csrf

        @include('addresses._form', [
            'address' => 'billing'
        ])

        <button type="submit" class="btn">
            Submit
        </button>

    </form>


@endsection