@extends('layouts.main')

@section('content')
<div class="frame">
    <div class="fHdr"></div>
    <p></p>
</div>
{{ Form::open(array('route'=>'payment', 'method'=>'get', 'class'=>'form-horizontal', 'role'=>'form', 'id'=>'frmPay')) }}
	<select id="cd-dropdown" class="cd-select">
		<option value="-1" selected>Method of Payment</option>
		@foreach ($countries as $key => $country) 
			<option value="{{ $country['id'] }}">{{ $country['country_name'] }}</option>
		@endforeach
	</select>
    <div class="table-responsive" >
	    <table class="table table-striped table-hover">
	        <thead>
	            <tr>
	                <th>Rate Per Plan</th>
	                <th>Tuition Fee</th>
	                <th>Per Charge Each Class</th>
	                <th>Description Plan</th>
	                <th>Sign Up</th>
	            </tr>
	        </thead>
	        <tbody id="paydesc">
                @foreach($paydetails as $pay)
                    <tr>
                        <td>{{ $pay['hdr_payment']['rate'] }}</td>
                        <td>{{ $pay['tuition'].' '.$pay['tuitCurr']  }}</td>
                        <td>{{ $pay['charge'] }}</td>
                        <td>{{ $pay['hdr_payment']['description'] }}</td>
                        <td>{{ Form::radio('signup', $pay['hdr_payment']['rate'], false, array('id'=>'signUp'.$pay['id'])) }}</td>
                        <td>{{ Form::hidden('country', $pay['country']['country_name'], array('id'=>'country')) }}</td>
                   </tr>
	            @endforeach
	        </tbody>
	    </table>
    </div>
{{ Form::close() }}
@stop