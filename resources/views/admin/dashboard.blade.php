@extends('layouts.admin')

@section('content')

    {{-- <h1 class="text-danger">TEST</h1> --}}

    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card w-50">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Bentornato')}}  {{Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
@endsection
