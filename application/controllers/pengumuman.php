<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengumuman extends CI_Controller {
	public function index(){
			$jumlah= $this->model_utama->view('pengumuman')->num_rows();
			$config['base_url'] = base_url().'pengumuman/index/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 15; 	
			if ($this->uri->segment('3')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('3');
			}
			$data['title'] = "Pengumuman";
			if (is_numeric($dari)) {
				$data['pengumuman'] = $this->model_app->view_ordering_limit('pengumuman','id_pengumuman','DESC',$dari,$config['per_page']);
			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->template->load(template().'/template',template().'/pengumuman',$data);
	}
}