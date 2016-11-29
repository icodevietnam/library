<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;

class Role extends Controller { 

    private $role;
    private $roleArr;

    public function __construct()
    {
        parent::__construct();
        $this->role = new \App\Models\Role();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
        $data['title'] = 'Role Management';
        $data['menu'] = 'user';
        $roleArr = unserialize(ROLES);
        $data['roleArr'] = $roleArr;
        View::renderTemplate('header', $data);
        View::render('Role/Role', $data);
        View::renderTemplate('footer', $data);
    }

    public function getAll(){
        echo json_encode($this->role->getAll());
    }

    public function add(){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        $data = array('name' => $name,'description' => $description,'code' => $code);
        echo json_encode($this->role->add($data));
    }

    public function delete(){
        $id = $_POST['itemId'];
        echo json_encode($this->role->delete($id));
    }

    public function get(){
        $id = $_GET['itemId'];
        echo json_encode($this->role->get($id));
    }


    public function update(){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $code = $_POST['code'];
        
        $id = $_POST['id'];

        $data = array('name' => $name,'description' => $description,'code' => $code);
        $where = array('id' => $id);

        echo json_encode($this->role->update($data,$where));
    }

}