<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Author extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'Author';
        $data['menu'] = 'library';
    	View::renderTemplate('header', $data);
        View::render('Author/Author', $data);
        View::renderTemplate('footer', $data);
    }


}