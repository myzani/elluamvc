<?php

class DetailPayment extends Eloquent {

	protected $table = 'detail_payment';
	protected $fillable = array('payId', 'payMethod', 'tuition', 'tuitCurr', 'charge');

	public function hdrpayment()
	{
		return $this->belongsTo('HdrPayment', 'payId', 'payId');
	}

	public function country()
	{
		//Model Class, Local Key, Parent Key
		return $this->belongsTo('Country', 'payMethod', 'id');
	}

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
}

?>