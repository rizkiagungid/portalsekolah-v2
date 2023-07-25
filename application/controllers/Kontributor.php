<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kontributor extends CI_Controller {
	public function index(){
		$data['title'] = "Pendaftaran Kontributor";
		$data['description'] = description();
		$data['keywords'] = keywords();

		$this->load->helper('captcha');
		$vals = array(
            'img_path'	 => './captcha/',
            'img_url'	 => base_url().'captcha/',
            'font_path' => './asset/Tahoma.ttf',
            'font_size'     => 31,
            'img_width'	 => '250',
            'img_height' => 75,
            'border' => 0, 
            'word_length'   => 5,
            'expiration' => 7200
        );

        $cap = create_captcha($vals);
        $data['image'] = $cap['image'];
        $this->session->set_userdata('mycaptcha', $cap['word']);
		$this->template->load(template().'/template',template().'/kontributor',$data);
	}

	function pendaftaran(){
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($this->input->post() && (strtolower($this->input->post('secutity_code')) == strtolower($this->session->userdata('mycaptcha')))) {
	            if ($hasil['file_name']==''){
	                    $data = array('username'=>cetak($this->input->post('a')),
	                                    'password'=>hash("sha512", md5(cetak($this->input->post('b')))),
	                                    'nama_lengkap'=>cetak($this->input->post('c')),
	                                    'email'=>cetak($this->input->post('d')),
	                                    'no_telp'=>cetak($this->input->post('e')),
	                                    'level'=>'kontributor',
	                                    'blokir'=>'N',
	                                    'id_session'=>md5(cetak($this->input->post('a'))).'-'.date('YmdHis'));
	            }else{
	                    $data = array('username'=>cetak($this->input->post('a')),
	                                    'password'=>hash("sha512", md5(cetak($this->input->post('b')))),
	                                    'nama_lengkap'=>cetak($this->input->post('c')),
	                                    'email'=>cetak($this->input->post('d')),
	                                    'no_telp'=>cetak($this->input->post('e')),
	                                    'foto'=>$hasil['file_name'],
	                                    'level'=>'kontributor',
	                                    'blokir'=>'N',
	                                    'id_session'=>md5(cetak($this->input->post('a'))).'-'.date('YmdHis'));
	            }

	            $this->model_app->insert('users',$data);
	            $datam = array('id_session'=>md5(cetak($this->input->post('a'))).'-'.date('YmdHis'),
	                           'id_modul'=>18);
	            $this->model_app->insert('users_modul',$datam);
	            $this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('username'=>cetak($this->input->post('a')),
								   'level'=>'kontributor',
                                   'id_session'=>md5(cetak($this->input->post('a'))).'-'.date('YmdHis')));
			}
			redirect('administrator/home');
		}
	}
}
