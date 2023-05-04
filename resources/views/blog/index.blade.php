@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.tabs.index')
                <div class="card">
                    <div class="card-header mb-3">{{ __('Dashboard') }}</div>
                    <div class="flex">
                        <a class="btn btn-primary mx-5" href="{{route('my_blog.create')}}">Create</a>
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
                                <th>Followers</th>
                                <th class="w-25">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr class="flex-row align-middle">
                                    <th>
                                        <a href="{{route('my_blog.show',['my_blog'=>$blog->id])}}">{{$blog->name}}</a>
                                    </th>
                                    <th>Followers</th>
                                    <th class="w-25">
                                        <form class="d-inline" method="post"
                                              action="{{route('my_blog.destroy',['my_blog'=>$blog->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger btn" type="submit">Delete</button>
                                        </form>
                                        <a class="btn btn-secondary"
                                           href="{{route('my_blog.edit',['my_blog'=>$blog->id])}}">Edit</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
