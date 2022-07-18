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
					  <li><a href="{{route('home')}}"><i class="fa-solid fa-house"></i></a></li>
                         <li><a href="{{route('conference.home')}}">Conference</a></li>
                         <li><a href="{{route('information.home')}}">Information</a></li>
                         <li><a href="{{route('scientific.home')}}">Scientific</a></li>
                         <li>
                            <a href="#"> Abstracts </a> <i class='bx bxs-chevron-down js-arrow arrow '></i>

                             <ul class="js-sub-menu sub-menu">
                                 <li><a href="{{route('abstract.dates')}}">Important Dates</a></li>
                                 <li><a href="{{route('abstract.guidelines')}}">Abstract Guideline</a></li>
                                 <li><a href="{{route('abstract.posterguidelines')}}">Poster Guideline</a></li>
                                 <li><a href="{{route('abstract.eposterguidelines')}}">E-poster Guideline</a></li>
                                 <li><a href="{{route('abstract.submitpage')}}">Submit Abstract</a></li>
                             </ul>
                         </li>

                         <li><a href="{{route('conference-register.show')}}">Registration</a></li>
                         <li><a href="{{route('accommodation.home')}}">Accommodation</a></li>
                         <li><a href="{{route('travel.home')}}">Travel </a></li>
                         <li><a  target="_blank" href="https://venous.in"> VAI</a></li>
                         <li><a href="{{route('sponsorship.show')}}"> Sponsorship </a></li>

                         @if (Auth::user())
                         <li>
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                     {{ __('Log Out') }}
                                 </a>
                             </form>
                         </li>
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
