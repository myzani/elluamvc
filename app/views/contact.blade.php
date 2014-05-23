@extends('layouts.main')

@section('content')
<div class="panel panel-default" id="conPanel">
    <div class="panel-heading">
        <div class="row">
            <h1 class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-3 col-sm-offset-4 col-sm-8 col-xs-offset-1 col-xs-12">Be One of Us!</h1>
        </div>
    </div>
    <div class='panel-body' id='pBody'>
        {{ Form::open(array('route'=>'contact', 'method'=>'post', 'role'=>'form', 'class'=>'form-horizontal', 'id'=>'frmContact')) }}
        @if(isset($id))
            <div id='pId'>
                <h4>{{ 'You are about to sign up for ' .$plan['hdr_payment']['rate']. ' - ' .$plan['country']['country_name']. '.' }}</h4>
                {{ Form::hidden('rate', $plan['hdr_payment']['rate'], array('id'=>'rate')) }}
                {{ Form::hidden('country_name', $plan['country']['country_name'], array('id'=>'country_name')) }}
            </div>
        @endif
        <div class="col-md-offset-3">
            <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    {{ Form::label('uname', 'Name:') }}
                    {{ Form::text('uname', '', array('class'=>'form-control', 'id'=>'name')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::email('email', '', array('class'=>'form-control', 'id'=>'email')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    {{ Form::label('subject', 'Subject:') }}
                    {{ Form::text('subject', '', array('class'=>'form-control', 'id'=>'subject')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    {{ Form::label('msg', 'Message:') }}
                    {{ Form::textarea('msg', '', array('class'=>'form-control', 'id'=>'message')) }}
                </div>
            </div>
            {{ Form::submit('Send', array('class'=>'btn btn-primary')) }}
            <span id="loadtxt">{{ HTML::image('images/loader.gif', '', array('id'=>'loader')) }}</span>
        </div>
        {{ Form::close() }}

        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" class="frmpaypal">
            <input type="hidden" name="buynow" value="buynow">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="item_name" value="Basketball">
            <input type="hidden" name="quantity" value="2">
            <input type="hidden" name="amount" value="1.5">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="shipping" value="0.25">
            <input type="hidden" name="tax" value="0.50">
            <input type="hidden" name="business" value="myzani_buss@hotmail.com">
            <!-- <button type="submit" class="btn btn-info">Pay Now</button> -->
        </form>

    </div>
    <div class="panel-footer" id="pFtr">
        <div class="pFtrRow row">
            <div class="box"><h5>Skype Account: Ellu-Academy</h5></div>
            <div class="box"><h5>Email Address: englishlanguniv@yahoo.com</h5></div>
        </div>
        <div class="pFtrRow row">
            <div class="box boxbot"><h5>BPI Account #: 003913-0370-21</h5></div>
            <div class="box boxbot"><h5>Account Name: Arlyn M. Valencia</h5></div>
        </div>
    </div>
</div>

@stop