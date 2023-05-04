@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.tabs.single')
                <div class="card position-relative">
                    <div
                        class="img-fluid"
                        style="background-image: url('/storage/blog/{{$blog->image}}');
                        background-repeat: no-repeat;
                        background-size: cover;
                        opacity: 0.5;
                        height: 400px;"
                    ></div>
                    <div style="width: 200px;position: absolute;bottom: 0;right: 0">
                        <a class="btn btn-primary w-50 rounded-5 position-absolute bottom-0 end-0 m-2"
                           href="{{route('my_blog.edit',['my_blog'=>$blog->id])}}">Edit</a>
                    </div>
                    <div style="width: 200px;position: absolute;bottom: 0;left: 0">
                        <a class="btn btn-success w-50 rounded-5 position-absolute bottom-0 start-0 m-2"
                           href="{{route('posts.create',['blog'=>$blog->id])}}">New post</a>
                    </div>
                </div>

                @include('blog.post.index')
            </div>
        </div>
    </div>
@endsection
