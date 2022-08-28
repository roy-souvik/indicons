<header>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img style="width:266px; margin:15px auto;" src="{{url('indicons/images/logo.png')}}">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="social">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i> </a>
                    <a href="#"><i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#"><i class="fa-brands fa-instagram"></i>

                    </a>
                </div>

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
