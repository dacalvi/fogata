<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends BackendController {

	public function index(){
		$this->view('dashboard_view');
	}



}