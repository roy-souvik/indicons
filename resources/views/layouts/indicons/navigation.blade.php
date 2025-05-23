<nav>
    <div class="container">
        <div class="row">
            <div class="navbar">
                <i class='bx bx-menu'></i>

                <div class="nav-links">
                    <div class="sidebar-logo">
                        <i class='bx bx-x'></i>
                    </div>

                    <ul class="links">

                        <li><a href="{{route('home')}}">Home</a></li>
                         <li><a href="{{route('about')}}">About</a></li>

                        <li><a href="{{route('information.home')}}">Information</a></li>

                        <li>
                            <a href="#"> Abstracts </a> <i class='bx bxs-chevron-down js-arrow arrow '></i>

                            <ul class="js-sub-menu sub-menu">

                                <li><a href="{{route('abstract.guidelines')}}">Abstract Guideline</a></li>
                                <li><a href="{{route('abstract.posterguidelines')}}">Poster Guideline</a></li>
                                <li><a href="{{route('abstract.eposterguidelines')}}">E-poster Guideline</a></li>
                                <li><a href="{{route('abstract.submitpage')}}">Submit Abstract</a></li>
                            </ul>
                        </li>



                        @if (Auth::user() && !Auth::user()->isSuperAdmin())
                        <li><a href="{{ route('payment.show') }}">Conference Payment</a></li>

                        <li><a href="{{ route('conference.addons.show') }}">Conference Addons</a></li>
                        @endif

                        @if (!Auth::user())
                        <li><a href="{{route('conference-register.show')}}">Registration</a></li>
                        @endif
                        <li><a href="{{route('accommodation.home')}}">Accommodation</a></li>
                        <li><a href="{{route('workshop.register.show')}}">Workshop Register</a></li>

                        @if (Auth::user())
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                        @else
                        <li style="background-image: linear-gradient(to right, #eb3941, #f15e64, #e14e53, #e2373f);
    box-shadow: 0 5px 15px rgba(242, 97, 103, .4);"><a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                        @endif
                    </ul>
                </div>
                <div class="search-box">
                    <i style="text-indent:-99999px;" class='bx bx-search'></i>

                </div>
            </div>
        </div>
    </div>
</nav>
