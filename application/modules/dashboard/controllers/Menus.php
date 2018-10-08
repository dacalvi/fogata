<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends BackendController {

	public function items(){
        $crud = $this->getCrudInstance('dashboard_menu_items');
        $crud->set_relation('parent_item_id','dashboard_menu_items','name');
        $crud->set_relation('parent_category_id','dashboard_menu_categories','name');


        $crud->set_relation_n_n('permissions', 'dashboard_menu_permissions', 'groups', 'menu_item_id', 'user_group_id', 'name');

        $data = $crud->render();
		$this->view('menus_view', $data);
    }
    
    public function categories(){
        $crud = $this->getCrudInstance('dashboard_menu_categories');
        $data = $crud->render();
		$this->view('menus_view', $data);
	}



}