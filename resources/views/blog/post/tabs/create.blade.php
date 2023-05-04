<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link" href="{{route('my_blog.index')}}">My Blogs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('my_blog.show',['my_blog'=>$blog->id])}}">{{$blog->name}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="">New Post</a>
    </li>
</ul>
