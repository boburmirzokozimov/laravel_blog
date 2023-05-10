<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Comments
                </div>
                <div class="card-body p-4">
                    @foreach($comments as $comment)
                        <div class="col-12 d-flex align-items-center position-relative">
                            <div class="col-1">
                                <img src="/storage/user/{{$comment->author->avatar}}" class="avatar"
                                     style="height: 40px;width: 40px; position: relative" alt="">
                            </div>
                            <div class="px-4 col-10" style="flex-basis: auto">
                                <span>
                                    <p>
                                    {{$comment->comment}}
                                    </p>
                                    <span class="opacity-25">
                                        {{$comment->created_at->diffForHumans()}}
                                    </span>
                                </span>
                            </div>
                            <div class="col-1 h-auto d-flex justify-content-between align-items-center flex-column">
                                <div>
                                    <form method="post" class="" action="/comment">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{$comment->id}}">
                                        <button class=" btn"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <form method="post" style="position:relative;"
                                          action="/comment">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        <button
                                            class="btn btn-sm {{$comment->isLiked(auth()->user()->id) ? 'btn-danger' : ''}}">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                        <span>
                                        {{$comment->getLikesCount()}}
                                    </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>

                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/comment">
                        @csrf
                        <div class="mb-3">
                            <label for="comment">Make a comment</label>
                            <textarea name="comment" class="form-control" id="comment" cols="15" rows="5"></textarea>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="author_id" value="{{auth()->user()->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
