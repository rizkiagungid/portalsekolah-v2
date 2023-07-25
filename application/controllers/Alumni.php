<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alumni extends CI_Controller {
	public function index(){
		$data['title'] = "Download Area";
		$data['description'] = description();
		$data['keywords'] = keywords();
		$this->template->load(template().'/template',template().'/alumni',$data);
	}
}
