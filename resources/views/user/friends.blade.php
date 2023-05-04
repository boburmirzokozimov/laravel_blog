@php use Illuminate\Support\Facades\Auth; @endphp
<aside class="friends">
    <h3>Your friends</h3>
    @if(Auth::user()->hasFriends())
        <div class="list-group">
            @foreach(Auth::user()->friends as $friend)
                <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                   href="{{route('users.show',['user'=>$friend->id])}}">
                    <span>{{$friend->name}}</span>
                    @if($friend->hasAvatar())
                        <img class="friends-avatar" src="/storage/user/{{$friend->avatar}}" alt="">
                    @endif
                </a>
            @endforeach
        </div>
    @else
        Nope you don't have friends,yet
    @endif
</aside>
