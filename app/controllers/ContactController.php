<?php

class ContactController extends BaseController
{
    public function getContact()
    {
        return View::make('contact')->with('title', 'Ellua - Contact');
    }
    
    public function postContact()
    {
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt to create setting'
            ));
        }
        
        $responseMsg = array('status'=>true, 'msg'=>'Your message has been sent!');
        
        $validator = Validator::make(Input::all(),
            array(
                'name'     => 'required|max:20|min:3',
                'email'    => 'required|max:50|email',
                'subject'  => 'required|max:50|alpha',
                'message'  => 'required|min:10|max:200'
        ));
            
        if($validator->fails()) {
            return Response::json($validator->errors());
        } else {
            $name   = e(Input::get('name'));
            $email  = e(Input::get('email'));
            $subj   = e(Input::get('subject'));
            $msg    = e(Input::get('message'));
            $rate   = e(Input::get('rate'));
            $cName  = e(Input::get('cName'));
                       
            Mail::send('emails.auth.emailMsg', array('name'=>$name, 'msg'=>$msg, 'rate'=>$rate, 'cName'=>$cName), function($msg) use($name, $email, $subj){
                $msg->from('billing@triple-m.co.za', $email);
                $msg->to($email, $name)->subject($subj);
            });
            
            return Response::json($responseMsg);
        }
    }
    
    public function getContactId($id)
    {
        $plan = DetailPayment::with('HdrPayment', 'Country')->where('id', '=', e($id))->first()->toArray();

        return View::make('contact')->with(array('title'=>'Ellua - Contact', 'id'=>$id, 'plan'=>$plan));
    }
}
?>