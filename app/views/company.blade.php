@extends('layouts.main')

@section('content')
	<h1>ABOUT</h1>
	<div class='row' id='hdrOwn'>
		<div class='col-lg-3 col-md-6 col-sm-1 col-xs-12' id='ownpic'>
			<p>{{ HTML::image('images/owner.jpg', 'Owner', array('id'=>'ownerpic')) }}</p>
		</div>
		<div class='col-lg-9 col-md-9 col-sm-9 col-xs-12'>
			<p>Good day everyone! Learning English online gives you more freedom along with a broader scope of motion! Despite when you clothe to go to an English class with severe discipline all you have to do is to remain seated in that comfortable chair, in a virtual space where you can feel free to keep practicing English language wherever you like and whenever you feel for it. In fact, not only you practice English online but also you learn about other cultures and other different points of views. You can find people of different cultures and minds. You can all exchange views on different issues. Thus you can improve your life. You can get familiar with other human beings whom think not like you. This is so beneficial for your life, isn’t it? Coz you can learn how to treat when faced with opposite thoughts and get ready for better future independently. </p>
		</div>
		<div class='col-lg-3 col-md-2 col-sm-3 col-xs-12'><p>- Arlyn M. Valencia</p></div>
	</div>
	<div class='row'>
		<div class='col-md-6'>
			<div class='thumbnail hdrAbout'>
				<h4 class='hdrComp'>MISSION / VISION</h4>
				<div class='caption'>
					<ul>
						<li>Striving towards academic excellence by imparting a high level of learning which seeks to develop a competent community of practicing professionals and responsive future leaders</li>
						<li>Promoting a culture of sharing by extending expertise to other educational institutions for continuous professional growth</li>
					</ul>
				</div>
			</div>
		</div>
		<div class='col-md-6'>
			<div class='thumbnail hdrAbout'>
				<h4 class='hdrComp'>COMPANY OBJECTIVES</h4>
				<div class='caption'>
					<ul>
						<li>Provide quality education that responds to the challenge of producing globally competitive individuals.</li>
						<li>Inculcate values, virtues, and develop an expanded sense of culture and appreciation for the arts among the student body.</li>
						<li>Instill the culture of peace as an avenue for promoting harmony and understanding among peoples.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

@stop