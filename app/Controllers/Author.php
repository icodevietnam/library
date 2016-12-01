<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Author extends Controller { 

    private $authors;

    public function __construct()
    {
        parent::__construct();
        $this->authors = new \App\Models\Authors();
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

    public function getAll(){
        echo json_encode($this->authors->getAll());
    }

    public function add(){
        $name = $_POST['name'];
        $fullName = $_POST['fullName'];
        $birthDate = $_POST['birthDate'];
        $shortName = $_POST['shortName'];
        $bio = $_POST['bio'];
        $data = array('name' => $name,'fullName' => $fullName,'birth_date'=>$birth_date,'shortName'=>$shortName,'bio'=>$bio,'img'=>$img);
        echo json_encode($this->authors->add($data));
    }

    public function delete(){
        $id = $_POST['itemId'];
        echo json_encode($this->authors->delete($id));
    }

    public function get(){
        $id = $_GET['itemId'];
        echo json_encode($this->authors->get($id));
    }


    public function update(){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        
        $id = $_POST['id'];

        $data = array('name' => $name,'fullName' => $fullName,'birth_date'=>$birth_date,'shortName'=>$shortName,'bio'=>$bio,'img'=>$img);
        $where = array('id' => $id);

        echo json_encode($this->authors->update($data,$where));
    }

    public function checkCode(){
        $code = $_GET['code'];
        echo json_encode($this->authors->checkCode($code));
    }


}