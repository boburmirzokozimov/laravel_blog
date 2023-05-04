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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table rounded-5">
                            <thead class="table-dark rounded-5">
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Nick name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="w-25">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if(!Auth::user()->isEqual($user))
                                    <tr class="flex-row align-middle">
                                        <th>
                                            <a href="{{route('users.show',['user'=>$user->id])}}">{{$user->name}}</a>
                                        </th>
                                        <th class="col-2">
                                            {{$user->surname}}
                                        </th>
                                        <th class="col-2">
                                            {{$user->nickname}}
                                        </th>
                                        <th class="col-2">
                                            {{$user->email}}
                                        </th>
                                        <th class="col-2">
                                            <form method="POST"
                                                  action="{{route('user-role.role',['user'=>$user->id])}}">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="user" value="{{$user->id}}">
                                                <select name="role" id="user-role" class="form-select"
                                                        aria-label="Default select example"
                                                        onchange="this.form.submit()">
                                                    @foreach($roles as $key => $value)
                                                        @if($user->isRoleEqual($value))
                                                            <option selected value="{{$value}}">{{$key}}</option>
                                                        @else
                                                            <option value="{{$value}}">{{$key}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </form>
                                        </th>
                                        <th class="col-2">
                                            <form class="d-inline" method="post"
                                                  action="{{route('users.destroy',['user'=>$user->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-danger btn btn-sm" type="submit">Delete</button>
                                            </form>
                                            <a class="btn btn-secondary btn-sm"
                                               href="{{route('users.edit',['user'=>$user->id])}}">Edit</a>
                                        </th>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
