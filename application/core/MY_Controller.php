<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class CommonController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cleanview($template, $data=null){
        $data = (array)$data;
        $this->load->view($template,(array)$data);
    }
}

class FrontendController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($template, $data=null){
        $data = (array)$data;
        $data['template'] = 'front/'.$template;
        $this->load->view('front/'.'layout',(array)$data);
    }
}

class BackendController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($template, $data=null){
        $data = (array)$data;
        $data['template'] = $template;
        $this->load->view('back/'.'layout',(array)$data);
    }

    protected function getCrudHTML($table){
        $crud = $this->getCrudInstance($table);
        return $crud->render();
    }

    protected function getCrudInstance($table){
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table($table);
        $crud->set_subject($table);
        return $crud;
    }

    
}