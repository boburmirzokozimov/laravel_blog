@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-3">{{ __('Dashboard') }}</div>
                    <div class="flex">
                        <a class="btn btn-primary mx-5" href="{{route('users.create')}}">Create</a>
                    </div>
                    <div class="card-body">
                        <include-fragment src="/partials/users">
                        </include-fragment>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/@github/include-fragment-element"></script>
@endsection
