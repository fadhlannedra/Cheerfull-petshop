<?php
	class madmin extends CI_Model{
		function tampil($tampil){
			$config['num_links'] = 5;
			$config['next_page'] = '<i class="fa fa-angle-right"></i>';
			$config['prev_page'] = '<i class="fa fa-angle-left"></i>';
			$config['num_tag_open'] = "<li>";
			$config['num_tag_close'] = '</li>';
			$config['next_tag_open'] ="<li>";
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li>";
			$config['cur_tag_close'] = '</li>';
			
			if($this->uri->segment(3) == ''){
				$page = 0;
			}else{
				$page = $this->uri->segment(3);
			}
			
			if($tampil == 'product'){
				$config['per_page'] = 10;
				$config['base_url'] = base_url().'admin/product';
				$config['total_rows'] = $this->db->query("SELECT * FROM produk,category WHERE produk.id_category = category.id_category")->num_rows();
				
				$this->pagination->initialize($config);
				$query = $this->db->query("SELECT * FROM produk,category WHERE produk.id_category = category.id_category LIMIT ".$page.",".$config['per_page']."");
				$tampil = $query->result();
				return $tampil;
			}else if($tampil == 'category'){
				$config['per_page'] = 10;
				$config['base_url'] = base_url().'admin/category';
				$config['total_rows'] = $this->db->query("SELECT * FROM category")->num_rows();
				
				$this->pagination->initialize($config);
				$query = $this->db->query("SELECT * FROM category LIMIT ".$page.",".$config['per_page']."");
				$tampil = $query->result();
				return $tampil;
			}else if($tampil == 'brand'){
				$config['per_page'] = 10;
				$config['base_url'] = base_url().'admin/brand';
				$config['total_rows'] = $this->db->query("SELECT * FROM brand")->num_rows();
				
				$this->pagination->initialize($config);
				$query = $this->db->query("SELECT * FROM brand LIMIT ".$page.",".$config['per_page']."");
				$tampil = $query->result();
				return $tampil;
			}else if($tampil == 'user'){
				$config['per_page'] = 10;
				$config['base_url'] = base_url().'admin/user';
				$config['total_rows'] = $this->db->query("SELECT * FROM user WHERE status != 0")->num_rows();
				
				$this->pagination->initialize($config);
				$query = $this->db->query("SELECT * FROM user WHERE status != 0 LIMIT ".$page.",".$config['per_page']."");
				$tampil = $query->result();
				return $tampil;
			}else if($tampil == 'review'){
				$config['per_page'] = 10;
				$config['base_url'] = base_url().'admin/review';
				$config['total_rows'] = $this->db->query("SELECT * FROM review")->num_rows();
				
				$this->pagination->initialize($config);
				$query = $this->db->query("SELECT * FROM review ORDER BY status ASC LIMIT ".$page.",".$config['per_page']."");
				$tampil = $query->result();
				return $tampil;
			}else if($tampil == 'order'){
				$config['per_page'] = 10;
				$config['base_url'] = base_url().'admin/order';
				$config['total_rows'] = $this->db->query("SELECT * FROM orders")->num_rows();
				
				$this->pagination->initialize($config);
				$query = $this->db->query("SELECT * FROM orders LIMIT ".$page.",".$config['per_page']."");
				$tampil = $query->result();
				return $tampil;
			}
		}
		function delete(){
			if($this->uri->segment(2)=='product'){
				$this->db->where('id',$this->uri->segment(4));
				$hapus = $this->db->delete('produk');
			}else if($this->uri->segment(2)=='category'){
				$this->db->where('id_category',$this->uri->segment(4));
				$hapus = $this->db->delete('category');
			}else if($this->uri->segment(2)=='brand'){
				$this->db->where('id_brand',$this->uri->segment(4));
				$hapus = $this->db->delete('brand');
			}else if($this->uri->segment(2)=='user'){
				$this->db->where('id',$this->uri->segment(4));
				$hapus = $this->db->delete('user');
			}else if($this->uri->segment(2)=='review'){
				$this->db->where('id',$this->uri->segment(4));
				$hapus = $this->db->delete('review');
			}
			return $hapus;
		}
	}
?>