<?php

class TeachController extends BaseController {
    
	public function Index()
	{
		return View::make('index')->with('title', 'Ellua - Homepage');
	}

	public function Company()
	{
		return View::make('company')->with('title', 'Ellua - Company');
	}
	
	public function Search()
    {
        return View::make('search');
    }
    
    public function ShowTeach()
    {
        $teachers = Teacher::orderBy('name')->paginate(15);
        
        return View::make('teacher')->with(array('title'=>'Ellua - Teacher', 'teachers'=>$teachers));
    }
    
    public function TeachPerExpert()
    {
        if (Request::ajax())
        {
            $tId = e(Input::get('tId'));
            $expertise = Teacher::where('tId', '=', $tId)->first();
            if($expertise !== NULL){
                $teachExpert = $expertise->expertise->toArray();
                return Response::json($teachExpert);
            }
        }
        return Response::json(array('status'=>false, 'error'=>'No records found!'));
    }
    
    public function SocialMedia()
    {
        $application = array(
            'appId' => '659838027411121',
            'secret' => '08d09580acd98a6de9d005421dc40ed8'
        );
        $permissions = 'publish_stream';
        $url_app = 'http://elluamvc.dev:81/payment';

        FacebookConnect::getFacebook($application);

        $getUser = FacebookConnect::getUser($permissions, $url_app);
    }

}