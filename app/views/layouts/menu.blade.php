<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
	  	<a href="{{ URL::route('teach') }}" class="pull-left">{{ HTML::image('images/logo.png', 'ELLUA', array('class'=>'logo')) }}</a>
		<a href="{{ URL::route('teach') }}" class="navbar-brand elluaDesc"><span> English Language Learning Universal Academy </span></a>
		<button class="navbar-toggle clearfix" data-toggle="collapse" data-target=".navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<div class="collapse navbar-collapse navHeaderCollapse clr"> 
			<ul class="nav navbar-nav navbar-right" id="menu">
				<li class="active home" id='home'><a href="{{ URL::route('teach') }}">Home</a></li>
				<li class="about dropdown">
					<a href="{{ URL::route('company') }}" class="dropdown-toggle dropAbout" data-toggle="dropdown">About <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a class="m_admin" href="{{ URL::route('company') }}">Company</a> </li>
						<li><a class="m_admin" href="{{ URL::route('teacher') }}">Teacher's Profile</a> </li>
					</ul>
				</li>
				<li class="course"><a href="{{ URL::route('course') }}">Courses</a></li>
				<li class="payment"><a href="{{ URL::route('payment') }}">Payments</a></li>
				<li class="contact"><a href="{{ URL::route('contact') }}">Contact Us</a></li>
				<li class="search">
                    {{ Form::open(array('route'=>'getSearch', 'method'=>'get', 'class'=>'form-horizontal', 'role'=>'form', 'id'=>'frmSearch')) }}   
                        <input type="search" placeholder="search" class="inputSearch" />
                        <span id="clear-search">&times;</span>
                        {{ HTML::image('images/search.png', 'Search', array('id'=>'search')) }}
                    {{ Form::close() }}
				</li>
			</ul>
		</div>
	</div>
</div>