<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Country extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'Country';
        $data['menu'] = 'library';
    	View::renderTemplate('header', $data);
        View::render('Country/Country', $data);
        View::renderTemplate('footer', $data);
    }


}