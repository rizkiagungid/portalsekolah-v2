<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Albums extends CI_Controller {
	public function index(){
			$jumlah= $this->model_utama->view('album')->num_rows();
			$config['base_url'] = base_url().'albums/index/'.$this->uri->segment(3);
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 25; 	
			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}
			$data['title'] = "Albums";
			$data['description'] = description();
			$data['keywords'] = keywords();
			if (is_numeric($dari)) {
				$data['album'] = $this->model_utama->view_where_ordering_limit('album',array('aktif' => 'Y'),'id_album','DESC',$dari,$config['per_page']);
			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->template->load(template().'/template',template().'/album',$data);
	}

	public function detail(){
		$query = $this->model_utama->view_where('album',array('album_seo' => $this->uri->segment(3)));
		if ($query->num_rows()<=0){
			redirect('main');
		}else{
			$row = $query->row_array();
			$jumlah= $this->model_utama->view_where('gallery',array('id_album' => $row['id_album']))->num_rows();
			$config['base_url'] = base_url().'albums/detail/'.$this->uri->segment(3);
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 1;
			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}
			$data['title'] = "Albums $row[jdl_album]";
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['rows'] = $row;
			if (is_numeric($dari)){
				$data['detailalbum'] = $this->model_utama->view_join_two('gallery','users','album','username','id_album',array('gallery.id_album' => $row['id_album']),'id_gallery','DESC',$dari,$config['per_page']);
			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);

			$dataa = array('hits_album'=>$row['hits_album']+1);
			$where = array('id_album' => $row['id_album']);
			$this->model_utama->update('album', $dataa, $where);
			$this->template->load(template().'/template',template().'/detailalbum',$data);
		}
	}
}
