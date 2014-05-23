<?php

class PaymentController extends BaseController {

	public function Index()
	{
		$countries = Country::all();
		$paydetails = DetailPayment::with('Country', 'HdrPayment')->where('paymethod', '=', 1)->get()->toArray();
		return View::make('payment')
		   	   ->with(array('title'=>'Ellua - Payment', 'countries'=>$countries, 'paydetails'=>$paydetails));
	}

	public function ShowPayment()
	{
		if (Request::ajax())
        {
		    $id = Input::get("vId");
    		$details = DetailPayment::with('Country', 'HdrPayment')->where('payMethod', '=', $id)->get()->toArray();
            
            return Response::json($details);
        }
        return Redirect::route('teach');
	}

}