<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Out Of Office">
    <meta name="author" content="Jason Michels">
    <meta name="keywords" content="Out Of Office">
    <link rel="shortcut icon" href="/ico/favicon.png">

    @section('og-meta')
        @include('partials.fb-og-meta', array('data' => array('og:site_name'=>'Out Of Office', 'og:url' => Request::url(), 'og:title' => 'Out Of Office', 'og:description' => 'Out Of Office')))
    @show

    <title>Out Of Office</title>

    <link href="{{ asset('components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('components/bootstrap/dist/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('components/pickadate/lib/compressed/themes/default.css') }}" rel="stylesheet">
    <link href="{{ asset('components/pickadate/lib/compressed/themes/default.date.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet">

    <script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Wrap all page content here -->
<div id="wrap">

    @include('layouts.nav')

    <!-- Begin page content -->
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

</div>

<div id="footer">
    <div class="container">

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">stuff</a></li>
            </ul>
            <p class="text-muted pull-right credit">Copyright &copy; {{ date("Y") }} Jason Michels. All rights reserved.</p>
        </div>

    </div>
</div>

<script src="{{ asset('components/pickadate/lib/compressed/picker.js') }}"></script>
<script src="{{ asset('components/pickadate/lib/compressed/picker.date.js') }}"></script>
<script src="{{ asset('components/pickadate/lib/compressed/legacy.js') }}"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>

</body>
</html>





