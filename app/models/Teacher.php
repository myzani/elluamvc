<?php
class Teacher extends Eloquent
{
    protected $table = 'teacher';
    protected $primaryKey = 'tId';
    protected $fillable = array('tId', 'name', 'image', 'quote');
    
    public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	
    public function expertise()
    {
        return $this->belongsToMany('Expertise', 'teacher_expertise', 'tId', 'eId');
    }	
}

?>