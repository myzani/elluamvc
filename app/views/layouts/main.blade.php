<!Doctype html>
<html>
	<head>
		<title>{{ $title }}</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{ HTML::style('style/bootstrap.css') }}
        {{ HTML::style('style/font-awesome/css/font-awesome.min.css') }}
		{{ HTML::style('style/main.css') }}
		{{ HTML::style('images/favicon.ico', array('rel'=>'shortcut icon')) }}
		<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
	</head>
<body>
	@include('layouts.menu')
	<div class="overlay"><i class="fa fa-times fa-3x pull-right" id='close'></i></div>
	<div class="container" id="cont">
		<div class="frameSrch"></div>
		@yield('content')
	</div>
        <div class="navbar navbar-inverse navbar-bottom" id="footer">
            <div class="container" > 
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="navbar-text elluaDescFtr">&copy;Copyright {{ date('Y') }} ELLUA - All rights reserved</p>
                        <ul class="socLogo1">
                            <li>{{ HTML::link('http://twitter.com/englishlanguniv', '', array('class'=>'social', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'ELLUA on Twitter')) }}</li>
                            <li>{{ HTML::link('http://facebook.com/englishlanguniv', '', array('class'=>'social', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'ELLUA on Facebook')) }}</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    
	{{ HTML::script('script/jquery-1.10.2.min.js') }}
	{{ HTML::script('script/jasny_bootstrap.min.js') }}
	{{ HTML::script('script/jquery.dropdown.js') }}
	{{ HTML::script('script/modernizr.js')}}
	{{ HTML::script('script/main.js') }}
</body>
</html>