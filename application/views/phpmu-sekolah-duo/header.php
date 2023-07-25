<?php
$download = $this->db->query("SELECT * FROM download ORDER BY RAND() LIMIT 1")->row_array();
echo "<div class='wrapper'>			
	<div class='header-logo'>";
		  $iden = $this->model_utama->view('identitas')->row_array();
		  $logo = $this->model_utama->view_ordering_limit('logo','id_logo','DESC',0,1);
		  foreach ($logo->result_array() as $row) {
			echo "<a href='".base_url()."'><img width='100%' src='".base_url()."asset/logo/$row[gambar]'/></a>";
		  }
	echo "</div>	
</div>

<div class='main-menu sticky'>	
<div style='padding:10px 10px 0px 20px'>
	<p><span class='city'><b style='color:rgb(255, 180, 0)'>Hari :</b> ".hari_ini(date('w')).", <b style='color:rgb(255, 180, 0)'>Tanggal :</b> ".tgl_indo(date('Y-m-d')).", <span id='jam'></span> WIB</span><br>
	<b style='color:rgb(255, 180, 0)'>DOWNLOAD :</b> <a href='".base_url()."download/file/$download[nama_file]'>$download[judul] (Download $download[hits] kali)</a></p>
</div>
</div>
<div class='main-menu sticky menu-color' style='background: linear-gradient(rgb(255, 180, 0) 0%, rgb(255, 126, 0) 100%) 0% 0% repeat scroll transparent;'>	
	<div class='wrapper'>";
		function main_menu() {
			$ci = & get_instance();
	        $query = $ci->db->query("SELECT id_menu, nama_menu, link, id_parent FROM menu where aktif='Ya' AND position='Bottom' order by urutan");
	        $menu = array('items' => array(),'parents' => array());
	        foreach ($query->result() as $menus) {
	            $menu['items'][$menus->id_menu] = $menus;
	            $menu['parents'][$menus->id_parent][] = $menus->id_menu;
	        }
	        if ($menu) {
	            $result = build_main_menu(0, $menu);
	            return $result;
	        }else{
	            return FALSE;
	        }
	    }

		function build_main_menu($parent, $menu) {
	        $html = "";
	        if (isset($menu['parents'][$parent])) {
	        	if ($parent=='0'){
		            $html .= "<ul class='the-menu'>";
		        }else{
		        	$html .= "<ul>";
		        }
	            foreach ($menu['parents'][$parent] as $itemId) {
	                if (!isset($menu['parents'][$itemId])) {
	                    if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
	                        $html .= "<li><a target='_BLANK' href='".$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
	                    }else{
	                        $html .= "<li><a href='".base_url().''.$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
	                    }
	                }
	                if (isset($menu['parents'][$itemId])) {
	                    if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
	                        $html .= "<li><a target='_BLANK' href='".$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span></a>";
	                    }else{
	                        $html .= "<li><a href='".base_url().''.$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span></a>";
	                    }
	                    $html .= build_main_menu($itemId, $menu);
	                    $html .= "</li>";
	                }
	            }
	            $html .= "</ul>";
	        }
	        return $html;
	    }
	    echo main_menu();
	echo "</div>
	</div>";
