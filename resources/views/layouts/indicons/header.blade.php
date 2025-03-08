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
                <div class="social">
            <a target="_blank" href="https://www.facebook.com/profile.php?id=100086394986838"><i class="fa-brands fa-facebook-f"></i> </a>
            {{-- <a   target="_blank" href="https://twitter.com/2023Vaicon"><i class="fa-brands fa-twitter"></i> --}}
            </a>
            {{-- <a  target="_blank" href="https://www.instagram.com/vaicon2023"><i class="fa-brands fa-instagram"></i> --}}

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
