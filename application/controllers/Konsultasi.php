<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konsultasi extends CI_Controller {
	public function index(){
			$jumlah= $this->model_utama->view('tbl_comment')->num_rows();
			$config['base_url'] = base_url().'konsultasi/index/'.$this->uri->segment(3);
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 15; 	
			if ($this->uri->segment('3')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('3');
			}
			$data['title'] = "Konsultasi";
			$data['description'] = description();
			$data['keywords'] = keywords();
			if (is_numeric($dari)) {
				$data['konsultasi'] = $this->model_utama->view_where_ordering_limit('tbl_comment',array('reply'=>0),'id_komentar','DESC',$dari,$config['per_page']);
			}else{
				redirect('main');
			}
			$data['usr'] = $this->model_utama->view_where('users', array('username'=>$this->session->username))->row_array();
			$this->pagination->initialize($config);
			$this->template->load(template().'/template',template().'/konsultasi',$data);
	}

	function reply(){
		if (isset($_POST['submit'])){
			$data = array('reply'=>cetak($this->input->post('a')),
                            'nama_lengkap'=>cetak($this->input->post('b')),
                            'alamat_email'=>cetak($this->input->post('c')),
                            'isi_pesan'=>cetak($this->input->post('d')),
                            'tanggal_komentar'=>date('Y-m-d'),
                            'jam_komentar'=>date('H:i:s'));
			$this->model_utama->insert('tbl_comment',$data);
			redirect('konsultasi');

		}
	}

	function delete(){
        cek_session_admin();
		$id = array('id_komentar' => $this->uri->segment(3));
        $this->model_app->delete('tbl_comment',$id);
		redirect('konsultasi');
	}


}
