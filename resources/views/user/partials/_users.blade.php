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

</table>


