@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.post.tabs.edit')
                <div class="card position-relative">
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
                    <form class="p-2" method="post"
                          action="{{route('posts.update',['blog'=>$blog->id,'post'=>$post->id])}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$post->title}}"
                                   id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <textarea id="summernote" name="editordata">{{$post->content}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="main_photo" class="form-label">Cover photo</label>
                            <input id="main_photo" class="form-control" value="{{$post->content_photo}}" type="file"
                                   name="main_photo"/>
                        </div>
                        <input type="hidden" value="{{$post->id}}" name="post">
                        <input type="hidden" value="{{$blog->id}}" name="blog">
                        <button class="btn-primary btn" type="submit">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
