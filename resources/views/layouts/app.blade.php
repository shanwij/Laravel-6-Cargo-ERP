<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/nav-modal.js') }}" defer></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ asset('css/newnav.css') }}" rel="stylesheet">

</head>

<body>
    <header class="navbar navbar-cargo">
        <div class="container-fluid">
            <div class="header-content">

                <div class="title-container">

                    <h1 class="title">
              <a title="Dashboard" id="logo" href="/">
              <img src="{{ asset('images/logo-2.png') }}" class="img-logo">
              </a>
            </h1>
                    @auth
                    <ul class="list-unstyled navbar-sub-nav">

                        @hasrole('operations') 
                        <li class="d-none d-xl-block d-lg-block">
                            <a class="active-tab dashboard-shortcuts-activity" href="{{ route('operations.bookings.index') }}">Operations</a>
                        </li>
                        @endhasrole

                        @hasrole('accounts')
                        <li class="d-none d-xl-block d-lg-block">
                            <a class="dashboard-shortcuts-activity" href="{{ route('accounts.incomes.index') }}">Accounts</a>
                        </li>
                        @endhasrole

                        @hasrole('marketing')
                        <li class="d-none d-xl-block d-lg-block">
                            <a class="dashboard-shortcuts-activity" href="{{ route('customers.opportunities.index') }}">Customers</a>
                        </li>
                        @endhasrole

                        @hasrole('resources')
                        <li class="d-none d-xl-block d-lg-block">
                            <a class="dashboard-shortcuts-activity" href="{{ route('employees.staff.index') }}">Employees</a>
                        </li>
                        @endhasrole

                        @hasrole('manager')
                        <li class="d-none d-xl-block d-lg-block">
                            <a class="dashboard-shortcuts-activity" href="{{ route('manage.users.index') }}">Manage</a>
                        </li>
                        @endhasrole

                    </ul>
                    @endauth
                </div>

                <div class="navbar-collapse collapse">

                    <ul class="list-unstyled navbar-sub-nav">

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif @else
                        <li class="d-none d-xl-block d-lg-block">

                            <a onclick="myFunction()" class="dropbtn header-user-dropdown-toggle">
                                <img width="23" height="23" class="header-user-avatar" src="{{ asset('images/avatar.png') }}">
                                <img class="arr-down" src="{{ asset('images/dropdown-arr-2.png') }}">
                            </a>

                            <div>

                                <div id="myDropdown" class="dropdown-menu dropdown-menu-right">

                                    <ul>
                                        <li class="current-user">
                                            <div class="user-name bold">
                                                {{ Auth::user()->name }}
                                            </div>
                                            {{ Auth::user()->email }}
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a class="profile-link" href="/">Settings</a>
                                        </li>
                                        <li>
                                            <a class="profile-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                            {{ __('Logout') }}

                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                    <div>
                                    </div>

                        </li>
                        @endguest
                    </ul>

                    </div>

                    </div>
                </div>
    </header>

    <main>
        @include('partials.alerts')
        
        @yield('content')
    </main>
    </div>
</body>

</html>