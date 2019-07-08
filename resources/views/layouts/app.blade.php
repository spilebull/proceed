<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Title --}}
  <title>Proceed</title>

  {{-- Fonts --}}
  <link rel="stylesheet" href="{{asset('/assets/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/css/font-awesome.family.css')}}">

  {{-- Styles --}}
  <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/css/bootstrap-footer.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/css/bootstrap-datetimepicker.css')}}">
  <!-- TODO -->
  <link rel="stylesheet" href="{{asset('/assets/css/rwd-table.min.css')}}">
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>body {font-family: 'Lato';}.fa-btn {margin-right: 6px;}</style>
</head>
<body id="app-layout">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        {{-- Collapsed Hamburger --}}
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        {{-- Branding Image --}}
        <a class="navbar-brand" href="{{ url('/') }}">Proceed</a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        {{-- Left Side Of Navbar --}}
        <ul class="nav navbar-nav">
          @if (Auth::user())
            <li class="{{ Request::path() ==  '/' ? 'active' : '' }}">
              <a href="{{ url('/') }}">
                  <i class="fa fa-home fa-lg" aria-hidden="true"></i> Home
              </a>
            </li>
            <?php $minutes = explode('/', Request::path()) ?>
            <li class="{{ Request::path() ==  'minutes/create' ? 'active' : '' || $minutes[0] ==  'minutes' ? 'active' : ''}}">
              <a href="{{ url('minutes/create') }}">
                  <i class="fa fa-plus" aria-hidden="true"></i> 新規作成
              </a>
            </li>
            <li class="{{ Request::path() ==  '#' ? 'active' : ''  }}">
              <a href="{{ url('/#') }}">
                  <i class="fa fa-users" aria-hidden="true"></i> 管理
              </a>
            </li>
          @endif
        </ul>

        {{-- Right Side Of Navbar --}}
        <ul class="nav navbar-nav navbar-right">
          {{-- Authentication Links --}}
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Sign in</i></a></li>
            <li><a href="{{ url('/register') }}"><i class="fa fa-registered" aria-hidden="true"></i> Sign up</a></li>
          @else
            <form class="navbar-form navbar-left" role="search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Keyword">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-info">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                </span>
              </div>
            </form>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->last_name." ".Auth::user()->first_name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sign out</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  {{-- Body Line --}}
  <div class="container">
    <div class="row">
      {{-- Flash Message Output --}}
      @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {!! session('flash_notification.message') !!}
        </div>
      @endif

      {{-- Main Content --}}
      @yield('content')
    </div>
  </div>

  {{-- Footer Line --}}
  <footer class="footer">
    <div class="container">
      @section('footer')
        <p class="text-muted">
          <cite title="http://www.usen.co.jp" style="padding-right: 10px;">
            <img src="{{asset('/assets/img/usen-logo.gif')}}" alt="USEN" height="18">
          </cite>
          <cite title="株式会社USEN">
            Copyright © USEN Inc. All Rights Reserved.
          </cite>
        </p>
      @show
    </div>
  </footer>

  @section('endbody')
    {{-- JavaScripts --}}
    <script src="{{asset('/assets/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
  @show
</body>
</html>
