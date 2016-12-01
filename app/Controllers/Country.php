<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Country extends Controller {	

    private $countries;

	public function __construct()
    {
        parent::__construct();
        $this->countries = new \App\Models\Countries();
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

    public function getAll(){
        echo json_encode($this->countries->getAll());
    }

    public function add(){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        $data = array('name' => $name,'description' => $description,'code' => $code);
        echo json_encode($this->countries->add($data));
    }

    public function delete(){
        $id = $_POST['itemId'];
        echo json_encode($this->countries->delete($id));
    }

    public function get(){
        $id = $_GET['itemId'];
        echo json_encode($this->countries->get($id));
    }


    public function update(){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        
        $id = $_POST['id'];

        $data = array('name' => $name,'description' => $description,'code' => $code);
        $where = array('id' => $id);

        echo json_encode($this->countries->update($data,$where));
    }

    public function checkCode(){
        $code = $_GET['code'];
        echo json_encode($this->countries->checkCode($code));
    }

}