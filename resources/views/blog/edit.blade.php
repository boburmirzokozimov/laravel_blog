@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-2">
                    <div style="margin-bottom: 20px;">
                        <div class="col-lg-12 margin-tb">
                            <div class="m-2">
                                <h3>Edit {{$blog->name}}</h3>
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

                    <form action="{{ route('my_blog.update',['my_blog'=>$blog->id]) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" value='{{$blog->name}}' class="form-control">
                                    <input type="hidden" name="blog_id" value='{{$blog->id}}' class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea class="form-control" style="height:150px"
                                              name="description">{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group position-relative">
                                    <div class="d-inline position-absolute"
                                         style="width: 100px;height: 100px;transform: translateX(-110%)">
                                        <img style="width: 100px;height: 100px" class=" rounded-circle"
                                             src="/storage/blog/{{$blog->image}}"
                                             alt="">
                                    </div>
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
