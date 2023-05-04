@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body position-relative d-flex justify-content-center align-items-end"
                         style="background-image:  url('/storage/banner/{{$curr_user->banner}}');
                        background-repeat: no-repeat;
                        background-size: cover;
                        opacity: 0.5;
                        height: 400px;"
                    >
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="position-relative h-50 w-50 d-flex justify-content-center align-items-center ">
                            @if($curr_user->hasAvatar())
                                <img class="avatar" src="/storage/user/{{$curr_user->avatar}}" alt="">
                            @endif
                        </div>

                        <form method="post"
                              class="position-absolute bottom-0 end-0 w-25"
                              action="/users/{{$curr_user->id}}/follow">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="user_id" value="{{\auth()->user()->id}}">
                            <input type="hidden" name="following_user_id" value="{{$curr_user->id}}">
                            <button type="submit"
                                    class="btn mb-3 mx-4 w-75 {{Auth::user()->isFollowing($curr_user) ? 'btn-danger':'btn-success' }} ">
                                {{Auth::user()->isFollowing($curr_user) ? 'Unfollow me':'Follow me' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
