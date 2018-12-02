<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item is-tab" href="{{route('home')}}">
            <img src="{{asset('images/logo.PNG')}}" alt="COCMS Logo" width="100" height="28"> 
        </a>
        
        @if(Request::segment(1)=="manage")
        <a class="navbar-item  is-hidden-desktop" id="admin-slideout-button">
            <spna>
                <i class="fa fa-arrow-circle-o-right"></i>
            </spna>
        </a>
        @endif
        
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
      
    <div id="navbarBasicExample" class="navbar-menu">
        
        @if(!Auth::guest())
            <div class="navbar-start">
                <a class="navbar-item is-tab m-l-10" href="#">Create</a>
                <a class="navbar-item is-tab" href="#">Assign</a>
                <a class="navbar-item is-tab" href="#">Develop</a>
                <a class="navbar-item is-tab" href="#">Grow</a>
                <a class="navbar-item is-tab" href="#">Sell</a>     
            </div>
        @endif
        
        <div class="navbar-end">
            <div class="navbar-item">
                @guest
                    <div class="buttons">
                        <a class="button is-primary is-tab" href="{{route('register')}}">
                            <strong>Join the Community!</strong>
                        </a>
                        <a class="button is-light is-tab" href="{{route('login')}}">
                            Log in
                        </a>
                    </div>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link is-tab">
                            Hey {{Auth::user()->name}}!
                        </a>
                
                        <div class="navbar-dropdown is-right">
                            <a class="navbar-item">
                                <span class="icon">
                                    <i class="fa fw fa-user-circle-o m-r-5"></i>
                                </span> Profile
                            </a>
                            <a class="navbar-item">
                                <span class="icon">
                                    <i class="fa fw fa-bell m-r-5"></i>
                                </span>Notifications
                            </a>
                            <a class="navbar-item" href="{{route('manage.dashboard')}}">
                                <span class="icon">
                                    <i class="fa fw fa-cog m-r-5"></i>
                                </span>Manage
                            </a>
                            <a class="navbar-item">
                                <span class="icon">
                                    <i class="fa fw fa-cog m-r-5"></i>
                                </span>Settings
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{route('logout')}}">
                                <span class="icon">
                                    <i class="fa fw fa-sign-out m-r-5"></i>
                                </span>Logout
                            </a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>