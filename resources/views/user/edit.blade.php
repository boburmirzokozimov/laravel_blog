@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-2">
                    <div style="margin-bottom: 20px;">
                        <div class="col-lg-12 margin-tb">
                            <div class="m-2">
                                <h3>Edit {{$user->name}}</h3>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.update',['user'=>$user->id]) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" value='{{$user->name}}' class="form-control">
                                    <input type="hidden" name="id" value='{{$user->id}}' class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Surname:</strong>
                                    <input type="text" name="surname" value='{{$user->surname}}' class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nick Name:</strong>
                                    <input type="text" name="nickname" value='{{$user->nickname}}' class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" value='{{$user->email}}'
                                           class="form-control">
                                </div>
                            </div>
                            @if(Auth::user()->id == $user->id)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="password" name="password"
                                               class="form-control">
                                    </div>
                                </div>
                            @endif
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group position-relative">
                                    <div class="d-inline position-absolute"
                                         style="width: 100px;height: 100px;transform: translateX(-110%)">
                                        @if($user->hasAvatar())
                                            <img style="width: 100px;height: 100px" class=" rounded-circle"
                                                 src="/storage/user/{{$user->avatar}}"
                                                 alt="avatar">
                                        @else
                                            <img style="width: 100px;height: 100px" class=" rounded-circle"
                                                 src="{{$user->getAvatar()}}"
                                                 alt="avatar">
                                        @endif
                                    </div>
                                    <strong>Avatar:</strong>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                @if(Auth::user()->id == $user->id)
                                    <div class="col-xs-12 col-sm-12 col-md-12 my-5">
                                        <div class="form-group position-relative">
                                            <div class="d-inline position-absolute"
                                                 style="width: 100px;height: 100px;transform: translateX(-110%)">
                                                @if($user->hasBanner())
                                                    <img style="width: 100px;height: 100px" class="rounded-circle"
                                                         src="/storage/banner/{{$user->banner}}"
                                                         alt="banner">
                                                @endif
                                            </div>
                                            <strong>Banner:</strong>
                                            <input type="file" name="banner" class="form-control">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
