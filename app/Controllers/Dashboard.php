<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Dashboard extends Controller {	

    private $generics;

	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'Dashboard';
        $data['menu'] = 'preference';
    	View::renderTemplate('header', $data,TEMPLATE);
        View::render('Dashboard/Dashboard', $data);
        View::renderTemplate('footer', $data,TEMPLATE);
    }


}