<?php

class Country extends Eloquent {

	protected $table = 'country';
	protected $fillable = array('country_name');

	public function detailpayment()
	{
		return $this->hasMany('DetailPayment', 'id');
	}

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

}

?>