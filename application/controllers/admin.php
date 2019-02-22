<?php
class admin extends CI_Controller {
	function __Construct(){
		parent::__Construct();
		$date = date('Y-m-d');
		if($this->session->userdata('login') != TRUE){
			echo "<script>location='".base_url()."login'</script>";
		}
	}
	function index(){
		$this->load->view("admin");
	}
	function logout(){
		$this->session->set_userdata('login',false);
		echo "<script>location='".base_url()."login'</script>";
	}
	function order(){
		if($this->uri->segment(3) == ''){
			$data['data'] = $this->madmin->tampil('order');
		}else if($this->uri->segment(3) == 'update'){
			$data = array('status' => $this->input->post('status'));
			$this->db->where('id_order',$this->input->post('id_order'));
			$update = $this->db->update('orders',$data);
			echo "<script>location='".base_url()."admin/order/edit/".$this->uri->segment(4)."'</script>";
		}elseif($this->uri->segment(3) == 'delete'){
			$this->madmin->delete();
			echo "<script>location='".base_url()."admin/review'</script>";
		}else{
			$data['data'] = '';
		}
		$this->load->view("admin",$data);
	}
	function product(){
		if($this->uri->segment(3) == ''){
			$data['data'] = $this->madmin->tampil('product');
		}else if($this->uri->segment(3) == 'tambah'){
			$data['data'] = '';
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
										 'description' => $this->input->post('description'),
										 'price' => $this->input->post('price'),
										 'pict' => $nama,
										 'id_category' => $this->input->post('id_category')
										  );
					$tambah = $this->db->insert('produk',$data);
				}else{
					echo "<script>alert('Upload Gagal')</script>";				
				}
			}else{
				echo "<script>alert('File Harus Berupa Gambar')</script>";				
			}
			echo "<script>location='".base_url()."admin/product'</script>";		
		}else if($this->uri->segment(3) == 'update'){
			$data['data'] = '';
			if($_FILES['file']['name'] != ''){
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
						$query = $this->db->query("SELECT * FROM produk WHERE id = '".$this->input->post('id')."'")->row_array();
						if($query['pict'] != ''){
							unlink('./assets\foto/'.$query['pict']);
						}
						$data = array('name' => $this->input->post('name'),
											 'description' => $this->input->post('description'),
											 'price' => $this->input->post('price'),
											 'pict' => $nama,
											 'id_category' => $this->input->post('id_category'),
											 'id_brand' => $this->input->post('id_brand')
											  );
						$this->db->where('id',$this->input->post('id'));
						$update = $this->db->update('produk',$data);
					}else{
						echo "<script>alert('Upload Gagal')</script>";				
					}
				}else{
					echo "<script>alert('File Harus Berupa Gambar')</script>";				
				}
			}else{
				$data = array('name' => $this->input->post('name'),
									 'description' => $this->input->post('description'),
									 'price' => $this->input->post('price'),
									 'id_category' => $this->input->post('id_category'),
									 'id_brand' => $this->input->post('id_brand')
									  );
				$this->db->where('id',$this->input->post('id'));
				$update = $this->db->update('produk',$data);
			}
			echo "<script>location='".base_url()."admin/product'</script>";
		}elseif($this->uri->segment(3) == 'delete'){
			$data ='';
			$this->madmin->delete();
			echo "<script>location='".base_url()."admin/product'</script>";
		}else{
			$data['data'] = '';
		}
		$this->load->view("admin",$data);
	}
	function category(){
		if($this->uri->segment(3) == ''){
			$data['data'] = $this->madmin->tampil('category');
		}else if($this->uri->segment(3) == 'tambah'){
			$data = array('name_cat' => $this->input->post('name_cat'),
								 'description' => $this->input->post('description')
								  );
			$tambah = $this->db->insert('category',$data);
			echo "<script>location='".base_url()."admin/category'</script>";		
		}else if($this->uri->segment(3) == 'update'){
			$data = array('name_cat' => $this->input->post('name_cat'),
								 'description' => $this->input->post('description')
								  );
			$this->db->where('id_category',$this->input->post('id_category'));
			$update = $this->db->update('category',$data);
			echo "<script>location='".base_url()."admin/category'</script>";
		}elseif($this->uri->segment(3) == 'delete'){
			$this->madmin->delete();
			echo "<script>location='".base_url()."admin/category'</script>";
		}else{
			$data['data'] = '';
		}
		$this->load->view("admin",$data);
	}
	function brand(){
		if($this->uri->segment(3) == ''){
			$data['data'] = $this->madmin->tampil('brand');
		}else if($this->uri->segment(3) == 'tambah'){
			$data = array('name_brand' => $this->input->post('name_brand'),
								 'description' => $this->input->post('description')
								  );
			$tambah = $this->db->insert('brand',$data);
			echo "<script>location='".base_url()."admin/brand'</script>";		
		}else if($this->uri->segment(3) == 'update'){
			$data = array('name_brand' => $this->input->post('name_brand'),
								 'description' => $this->input->post('description')
								  );
			$this->db->where('id_brand',$this->input->post('id_brand'));
			$update = $this->db->update('brand',$data);
			echo "<script>location='".base_url()."admin/brand'</script>";
		}elseif($this->uri->segment(3) == 'delete'){
			$this->madmin->delete();
			echo "<script>location='".base_url()."admin/brand'</script>";
		}else{
			$data['data'] = '';
		}
		$this->load->view("admin",$data);
	}
	function user(){
		if($this->uri->segment(3) == ''){
			$data['data'] = $this->madmin->tampil('user');
		}else if($this->uri->segment(3) == 'tambah'){
			$data['data'] = '';
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
										 'status' => $this->input->post('status'),
										 'pict' => $nama
										  );
					$tambah = $this->db->insert('user',$data);
				}else{
					echo "<script>alert('Upload Gagal')</script>";				
				}
			}else{
				echo "<script>alert('File Harus Berupa Gambar')</script>";				
			}
			echo "<script>location='".base_url()."admin/user'</script>";		
		}else if($this->uri->segment(3) == 'update'){
			$data['data'] = '';
			if($_FILES['file']['name'] != ''){
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
						$query = $this->db->query("SELECT * FROM user WHERE id = '".$this->input->post('id')."'")->row_array();
						if($query['pict'] != ''){
							unlink('./assets\foto/'.$query['pict']);
						}
						$data = array('name' => $this->input->post('name'),
											 'username' => $this->input->post('username'),
											 'email' => $this->input->post('email'),
											 'telephone' => $this->input->post('telephone'),
											 'address' => $this->input->post('address'),
											 'city' => $this->input->post('city'),
											 'postcode' => $this->input->post('postcode'),
											 'status' => $this->input->post('status'),
											 'pict' => $nama
											  );
						$this->db->where('id',$this->input->post('id'));
						$update = $this->db->update('user',$data);
					}else{
						echo "<script>alert('Upload Gagal')</script>";				
					}
				}else{
					echo "<script>alert('File Harus Berupa Gambar')</script>";				
				}
			}else{
				$data = array('name' => $this->input->post('name'),
									 'username' => $this->input->post('username'),
									 'email' => $this->input->post('email'),
									 'telephone' => $this->input->post('telephone'),
									 'address' => $this->input->post('address'),
									 'city' => $this->input->post('city'),
									 'postcode' => $this->input->post('postcode'),
									 'status' => $this->input->post('status')
									  );
				$this->db->where('id',$this->input->post('id'));
				$update = $this->db->update('user',$data);
			}
			echo "<script>location='".base_url()."admin/user'</script>";
		}elseif($this->uri->segment(3) == 'delete'){
			$data ='';
			$this->madmin->delete();
			echo "<script>location='".base_url()."admin/user'</script>";
		}else{
			$data['data'] = '';
		}
		$this->load->view("admin",$data);
	}
	function review(){
		if($this->uri->segment(3) == ''){
			$data['data'] = $this->madmin->tampil('review');
		}elseif($this->uri->segment(3) == 'delete'){
			$this->madmin->delete();
			echo "<script>location='".base_url()."admin/review'</script>";
		}else{
			$data['data'] = '';
		}
		$this->load->view("admin",$data);
	}
}
?>