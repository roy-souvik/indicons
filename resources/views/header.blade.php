<header>
    <div class="container">
        <div class="row" style="display:flex;     align-items: center;">
            <div class="col-md-6">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img class="logo-size" src="{{url('indicons/images/logo.png')}}">
                    </a>
                </div>
            </div>
            <div class="col-md-6">

                @if (Auth::user())
                <div class="user-reg">
                    <i class="fa-solid fa-user-check"></i> Welcome <a href="{{route('profile.show')}}">
                        {{Auth::user()->name}}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>
