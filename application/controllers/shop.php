<?php
	session_start();
	class shop extends CI_Controller {
		function index(){
			$this->load->view("index");
		}
		function produk(){
			$this->load->view("front/view");
		}
		function cart(){
			if($this->uri->segment(3) == 'ajax'){
				$this->load->view("front/cartajax");
			}else if($this->uri->segment(3) == 'add'){
				$_SESSION['cart'][$this->uri->segment(4)] =1;
			}else if($this->uri->segment(3) == 'delete'){
				unset($_SESSION['cart'][$this->uri->segment(4)]);
				if($this->uri->segment(5)=="y"){
					echo "<script>window.history.back()</script>";
				}
			}
		}
		function brand(){
			$this->load->view("index");
		}
		function report(){
			if($this->uri->segment(3) == "delete"){
				$this->db->where('id_order',$this->uri->segment(4));
				$this->db->delete('orders');
				$this->db->where('id_order',$this->uri->segment(4));
				$this->db->delete('order_produk');
				echo "<script>location='".base_url()."shop/report/</script>";
			}
			$this->load->view("index");
		}
		function detail(){
			$this->load->view("index");
		}
		function review(){
			$data = array('id_user' => $this->session->userdata('ids'),
								 'id_produk' => $this->uri->segment(3),
								 'review' => $this->input->post('review'),
								 'status' => 0
								  );
			$tambah = $this->db->insert('review',$data);
			echo "<script>location='".base_url()."shop/detail/".$this->uri->segment(3)."#review'</script>";
		}
		function category(){
			$this->load->view("index");
		}
		function product(){
			$this->load->view("index");
		}
		function mycart(){
			$this->load->view("index");
		}
		function checkout(){
			if($this->session->userdata('logins')!=''){
				$this->load->view("index");
			}else{
				echo "<script>location='".base_url()."shop/login/checkout'</script>";
			}
		}
		function login(){
			$this->load->view("index");
		}
		function logout(){
			$this->session->set_userdata('logins',false);
			echo "<script>location='".base_url()."shop/".$this->uri->segment(3)."/".$this->uri->segment(4)."'</script>";
		}
		function register(){
			$this->load->view("index");
		}
		function validasi(){	
			$username = mysql_real_escape_string($this->input->post('username'));
			$password = md5(mysql_real_escape_string($this->input->post('password')));
			
			$query = $this->db->query("SELECT * FROM user WHERE username = '$username' && password = '$password'");
			$data = $query->row_array();
			if($query->num_rows() == 1){
				$session = array('logins' => true,'names' => $data['name'],'statuss' => $data['status'],'usernames' => $data['username'],'ids' => $data['id'],'picts' => $data['pict']);
				$this->session->set_userdata($session);
				echo "<script>alert('Login Success');location='".base_url()."shop/".$this->uri->segment(3)."/".$this->uri->segment(4)."'</script>";
			}else{
				echo "<script>alert('Username atau Password anda salah.');location='".base_url()."shop/login/".$this->uri->segment(3)."/".$this->uri->segment(4)."'</script>";
			}
		}
		function beli(){
			$data = array('id_user' => $this->session->userdata('ids'),
								 'description' => $this->input->post('description'),
								 'address' => $this->input->post('address'),
								 'status' => 0
								  );
			$tambah = $this->db->insert('orders',$data);
			
			$query = $this->db->query("SELECT * FROM orders ORDER BY id_order DESC limit 0,1")->row();
			foreach($_SESSION['cart'] as $key => $val){
				$q = $this->db->get_where('produk',array('id'=>$key))->row();
				$data = array('id_produk' => $q->id,
									 'id_order' => $query->id_order,
									 'qty' => 1
									  );
				$this->db->insert('order_produk',$data);
				
				$data = array('sold' => $q->sold+1);
				$this->db->where('id',$key);
				$update = $this->db->update('produk',$data);
			}
			unset($_SESSION['cart']);
			echo "<script>location='".base_url()."shop/mycart/finish'</script>";	
		}
		function daftar(){
			$direktori = './assets/foto/';
			$max_size = 2000000;
			$nama_tmp  = $_FILES['file']['tmp_name'];
			$type  = $_FILES['file']['type'];
			$size  = $_FILES['file']['size'];
			$hasil =explode("/",$type);
			$nama = md5(uniqid(rand(),1)).'.'.$hasil[1];
			$typenya = $hasil[1];
			$upload = $direktori.$nama;
			
			if($size > $max_size){
				echo "<script>alert('File Max = 2mb')</script>";
			}else if($typenya == 'jpeg' || $typenya == 'jpg' || $typenya == 'png' || $typenya == 'gif'){
				if(move_uploaded_file($nama_tmp,$upload)){
					$data = array('name' => $this->input->post('name'),
										 'username' => $this->input->post('username'),
										 'password' => md5($this->input->post('password')),
										 'email' => $this->input->post('email'),
										 'telephone' => $this->input->post('telephone'),
										 'address' => $this->input->post('address'),
										 'city' => $this->input->post('city'),
										 'postcode' => $this->input->post('postcode'),
										 'status' => 2,
										 'pict' => $nama
										  );
					$tambah = $this->db->insert('user',$data);
				}else{
					echo "<script>alert('Upload Gagal')</script>";				
				}
			}else{
				echo "<script>alert('File Harus Berupa Gambar')</script>";				
			}
			echo "<script>location='".base_url()."shop/login'</script>";	
		}
		function search(){
			if($this->uri->segment(3) == '' && isset($_POST['search'])){
				echo "<script>location='".base_url()."shop/search/".$this->input->post('search')."'</script>";
			}else{
				$this->load->view('index');
			}
		}
	}
?>