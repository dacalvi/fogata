<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Backmod extends BackendController {

	public function index(){
		$data = $this->getCrudHTML('users');
		
		
		/*
		$crudHTML = $this->getCrudInstance('users')
		->columns('username')
		->render();
		*/

		$this->view('home', $data);
	}



}