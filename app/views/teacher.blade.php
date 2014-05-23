@extends('layouts.main')

@section('content')
    <i class="fa fa-chevron-right fa-3x" id="nxtIco"></i>
    <i class="fa fa-chevron-left fa-3x" id="prevIco"></i>
    <div class="frameTeach" id="frameTeach"></div>
    <div class="frameTeachShadow" id="frameTeachShadow"></div>
    <div class="frameNext" id="frameNext"></div>
    <div class="frameNextShadow" id="frameNextShadow"></div>
    <div class="framePrev" id="framePrev"></div>
    <div class="framePrevShadow" id="framePrevShadow"></div>
    <!-- Grid Images -->
    @foreach($teachers as $teacher)
    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-2 teachImgWrap">
        <span>Teacher {{ $teacher->name }}</span>
        {{ Form::hidden('teachId', $teacher->tId) }}
        <a href="#">{{ HTML::image('images/'.$teacher->image, $teacher->name, array('class'=>'thumbnail teachImg')) }}</a>
        <span id="quote">{{{ $teacher->quote }}}</span>
    </div>
    @endforeach
    <p class="clearfix">{{ $teachers->links() }}</p>
@stop