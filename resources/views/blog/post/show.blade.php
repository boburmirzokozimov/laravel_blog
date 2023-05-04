@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.post.tabs.show')
                <div class="card">
                    <div class="card-header mb-3 d-flex justify-content-between align-items-center">
                        <span>Post</span>
                        @if($post->is_author(auth()->user()))
                            <a class="btn btn-primary"
                               href="{{route('posts.edit',['blog'=>$blog->id,'post'=>$post->id])}}">Edit</a>
                        @endif
                    </div>
                    <div class="card-body">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('blog.post.comment')
    
@endsection
