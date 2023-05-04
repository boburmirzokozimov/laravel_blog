<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>

    <div class="card-body position-relative d-flex justify-content-center align-items-end"
         style="background-image:  url('/storage/banner/{{Auth::user()->banner}}');
                        background-repeat: no-repeat;
                        background-size: cover;
                        height: 400px;"
    >
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="position-relative h-50 w-50 d-flex justify-content-center align-items-center ">
            @if(Auth::user()->hasAvatar())
                <img class="avatar" src="/storage/user/{{Auth::user()->avatar}}" alt="">
            @endif
        </div>

    </div>
</div>
