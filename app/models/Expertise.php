<?php
	
class Expertise extends Eloquent {

	protected $table = 'expertise';
	protected $primaryKey = 'eId';
	protected $fillable = array('eId', 'description');
	
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	
	public function teacher()
    {
        return $this->belongsToMany('Teacher', 'teacher_expertise');
    }
}

?>