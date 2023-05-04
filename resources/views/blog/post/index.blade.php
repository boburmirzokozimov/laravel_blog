<main>
    @foreach($posts as $post)
        <div class="custom-card col-12 my-4">
            <div class="col-12 d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex flex-row align-items-center">
                    <div class="post-header mx-2">
                        @if($post->author->hasAvatar())
                            <img src="/storage/user/{{$post->author->avatar}}" alt="author avatar">
                        @else
                            <img src="{{$post->author->getAvatar()}}" alt="author avatar">
                        @endif
                    </div>
                    <div class="d-flex flex-column align-items-center text-start">
                        {{$post->author->getFullName()}}
                        @if(!auth()->user()->isEqual($post->author))
                            <form method="post" action="{{route('user-follow.follow',['user'=>$post->author->id])}}">
                                @csrf
                                @method('POST')
                                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                                <input type="hidden" value="{{$post->author->id}}" name="following_user_id">
                                <button type="submit"
                                        class="btn btn-sm mb-3 mx-4 w-75 {{Auth::user()->isFollowing($post->author) ? 'btn-danger':'btn-success' }} ">
                                    {{Auth::user()->isFollowing($post->author) ? 'Unfollow me':'Follow me' }}
                                </button>
                            </form>
                        @endif
                    </div>
                    <span class="mx-3 opacity-25">
                        Post published {{$post->created_at->diffForHumans()}}
                    </span>
                </div>
                <div>

                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <form method="post"
                                      action="{{route('posts.destroy',['blog'=>$post->blog->id,'post'=>$post->id])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" value="{{$post->blog->id}}" name="blog">
                                    <input type="hidden" value="{{$post->id}}" name="post">
                                    <button class="dropdown-item">Delete</button>
                                </form>
                            </li>
                            <li><a class="dropdown-item" href="#">Bookmark</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <h4 class="col-12 text-start fw-bold">
                    {{$post->title}}
                </h4>
                <img class="custom-img" src="/storage/post/{{$post->content_photo}}" alt="{{$post->title}}">
                <a class="btn-link" href="{{route('posts.show',['blog'=>$blog->id,'post'=>$post->id])}}">(more)</a>
            </div>
        </div>
    @endforeach
</main>
