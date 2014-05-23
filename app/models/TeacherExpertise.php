<?php

class TeacherExpertise extends Eloquent {

	protected $table = 'teacher_expertise';
	protected $fillable = array('teId', 'tId', 'eId');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

}

?>