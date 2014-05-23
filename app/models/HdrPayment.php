<?php

class HdrPayment extends Eloquent {

	protected $table = 'hdr_payment';
	protected $fillable = array('rate', 'description');

	function detailpayment()
	{
		return $this->hasMany('DetailPayment', 'payId');
	}

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

}