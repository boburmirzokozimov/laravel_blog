@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 position-relative">
                @include('user.banner')
                @include('user.friends')
                @include('user.content')
            </div>
        </div>
    </div>
@endsection
