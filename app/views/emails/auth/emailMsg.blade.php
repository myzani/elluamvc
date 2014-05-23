Hi I am {{ $name }}, <br/><br/>

@if($rate != "" && $cName != "")
    <p>{{ 'Signing up for '. $rate .' - '. $cName .'.'  }}</p>
@endif

{{ $msg }}