<!-- start header -->
<header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('assets/img/logoo.png') }}" alt="logo" /></a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? 'active' : null }}">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="{{ Request::is('tunawisma') ? 'active' : null }}">
                        <a href="{{ route('tunawisma.index')}}">Tunawisma</a>
                    </li>

                    <li class="{{ Request::is('detail-donasi') ? 'active' : null }}">
                        <a href="{{route('detail-donasi.index')}}">Donasi</a>
                    </li>
                    @auth
                    <li class="{{ Request::is('history-donasi') ? 'active' : null }}">
                        <a href="{{route('history-donasi')}}">History Donasi</a>
                    </li>
                    @endauth
                    <li class="{{ Request::is('kegiatan') ? 'active' : null }}">
                        <a href="{{route('kegiatan')}}">Kegiatan Sosial</a>
                    </li>
                    @auth
                    <li class="{{ Request::is('history-kegiatan') ? 'active' : null }}">
                        <a href="{{route('history-kegiatan')}}">History Kegiatan</a>
                    </li>
                    @endauth
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @endguest
                    <li>
                        @auth
                        <!-- Panel heading -->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt3">
                                    <i class="fa fa-angle-right"></i> {{Auth::user()->name}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne-alt3" class=" panel-collapse collapse">
                            <!-- Panel body -->
                            <div class="panel-heading floatright">
                                <a href="{{ route('settings',Auth::user()->user_id) }}">Settings</a>
                            </div>
                            <br>
                            <div class="panel-heading floatright">
                                <form class="ml-2" action="{{url('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit">Log out</button>
                                </form>

                            </div>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
