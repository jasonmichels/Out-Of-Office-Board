<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">

    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home.index') }}">Out Of Office</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                <li><a href="{{ route('status.manage.index') }}">OOO Statuses</a></li>
                <li><a href="{{ route('status.manage.create') }}">Create OOO</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                <li><a href="{{ route('user.account.signup') }}"><span class="glyphicon glyphicon-upload"></span> Sign Up</a></li>
                <li><a href="{{ route('user.account.login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{ Auth::user()->name }}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.manage.edit', array('id' => Auth::user()->id)) }}"><span class="glyphicon glyphicon-wrench"></span> Edit Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('user.account.logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->

    </div>

</div>