<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller {
	public function index(){
		$jumlah= $this->model_utama->view('download')->num_rows();
		$config['base_url'] = base_url().'download/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 20; 	
		if ($this->uri->segment('3')==''){
			$dari = 0;
		}else{
			$dari = $this->uri->segment('3');
		}
		$data['title'] = "Download Area";
		$data['description'] = description();
		$data['keywords'] = keywords();
		if (is_numeric($dari)) {
			$data['download'] = $this->model_utama->view_ordering_limit('download','id_download','DESC',$dari,$config['per_page']);
		}else{
			redirect('main');
		}
		$this->pagination->initialize($config);
		$this->template->load(template().'/template',template().'/download',$data);
	}

	function file(){
		$cek = $this->model_utama->view_where('download',array('nama_file' => $this->uri->segment(3)));
		if ($cek->num_rows()<=0){
			redirect('download');
		}else{
			$row = $cek->row_array();
			$dataa = array('hits'=>$row['hits']+1);
			$where = array('id_download' => $row['id_download']);
			$this->model_utama->update('download', $dataa, $where);

			$name = $this->uri->segment(3);
			$data = file_get_contents("asset/files/".$name);
			force_download($name, $data);
		}
	}

	function file_pengumuman(){
			$name = $this->uri->segment(3);
			$data = file_get_contents("asset/files/".$name);
			force_download($name, $data);
	}
}
