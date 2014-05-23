<?php
class PaypalController extends BaseController
{
    private _url = '';
    
    public function __constructor($option = 'live') {
        if($option == 'live')
            $this->_url = 'https://www.paypal.com/cgi-bin/webscr';
        else
            $this->_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
    }
    
    
}

?>