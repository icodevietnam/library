<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Category extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'Category';
        $data['menu'] = 'library';
    	View::renderTemplate('header', $data);
        View::render('Category/Category', $data);
        View::renderTemplate('footer', $data);
    }


}