<?php
	class login extends CI_Controller {
		function index(){
			$this->load->view("login");
		}
		function validasi(){	
			$username = mysql_real_escape_string($this->input->post('username'));
			$password = md5(mysql_real_escape_string($this->input->post('password')));
			
			$query = $this->db->query("SELECT * FROM user WHERE username = '$username' && password = '$password'");
			$data = $query->row_array();
			if($query->num_rows() == 1){
				$session = array('login' => true,'name' => $data['name'],'status' => $data['status'],'username' => $data['username'],'id' => $data['id'],'pict' => $data['pict']);
				$this->session->set_userdata($session);
				echo "<script>alert('Login Success');location='".base_url()."admin'</script>";
			}else{
				$session = array('pesan'=>'Username atau Password anda salah.');
				$this->session->set_userdata($session);
				echo "<script>location='".base_url()."login'</script>";
			}
		}
	}
?>