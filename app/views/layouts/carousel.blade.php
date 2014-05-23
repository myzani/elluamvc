<div id="mycarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
    <li data-target="#mycarousel" data-slide-to="1"></li>
    <li data-target="#mycarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      {{ HTML::image('images/banner01.jpg', 'School', array('class'=>'imgBanner')) }}
      <div class="carousel-caption">
        <p>Learning English offers great international job opportunity, made travel ling and living abroad easier. Give it a try and embrace your tomorrow with a better preparation. English is now taking an importance part in the chance to take a job. Hence, we can predict that English language will continue to develop and bring us more advantages in the near future; and, maybe someday, English will be the only language in the world.</p>
      </div>
    </div>
    <div class="item">
      {{ HTML::image('images/banner02.jpg', 'Friends', array('class'=>'imgBanner')) }}
      <div class="carousel-caption">
        <p>Teaching is a career that provides challenges, excitement, personal reward and a chance to encourage and support others to achieve their goals. Our teachers are good at explaining things having a strong knowledge in particular subject areas and are good time managers. We have ability to work in a team as well as using your own initiative, being fair-minded and we cope well with change and lastly were enjoying challenges in teaching English language.</p>
      </div>
    </div>
    <div class="item">
      {{ HTML::image('images/banner03.png', 'Learn', array('class'=>'imgBanner')) }}
      <div class="carousel-caption">
        <p>GOOD TEACHING is about listening, questioning, being responsive, and remembering that each student and class is different. It’s about eliciting responses and developing the oral communication skills of the students. It’s about pushing students to excel; at the same time, it’s about being human, respecting others, and being professional at all times.</p>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#mycarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#mycarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>
</div>