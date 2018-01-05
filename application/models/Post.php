<?php
class Post extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('kategori', 'post.kategori_id = kategori.id_kategori');
		$this->db->join('user', 'post.user_id = user.id_user');
		$this->db->where('post.status', $status);
		$this->db->order_by('post.id_post', "DESC");
    return $this->db->get()->result();
  }
  public function json() {
		$sesdev = $this->session->userdata('divisi_id');
	  $resd = explode(',',$sesdev);
	  $c = count($resd);
	  $status = 1;
	  $no = 1;
		$this->datatables->select('id_post,slug,judul,isi,user_id,tgl');
        $this->datatables->from('post');
		$this->datatables->join('user', 'post.user_id = user.id_user');
		$this->datatables->join('kategori', 'post.kategori_id = kategori.id_kategori');
		$this->datatables->where('post.status', $status);
		foreach($resd as $key => $value) {
			if($no == 1) {
				$this->datatables->like('kategori.divisi_id', $value);
			} else {
				$this->datatables->or_like('kategori.divisi_id', $value);
			}
		$no++; }
		$this->datatables->select('username');
		$this->datatables->add_column('action', '<a href="editpost/$1" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_post');
        $this->db->order_by('post.tgl', "DESC");
		return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$judul = $this->input->post('judul');
		$title = strip_tags($this->input->post('judul'));
		$titleu = strtolower(url_title($title));

		$this->db->where('slug', $titleu);
		$sl = $this->db->get('post')->num_rows();
		if ($sl > 0) {
			$slu = strtolower(url_title($title));
			$titleURL = $slu.'-'.time();
		} else {
			$titleURL = strtolower(url_title($title));
		}
		date_default_timezone_set('Asia/Jakarta');
		$waktu = date('Y-m-d G:i:s');
		$user_id = $this->session->userdata('user_id');
		$isi = $this->input->post('isi');
		$kategori_id = $this->input->post('kategori_id');
		$tag = $this->input->post('tag_id');
		if($tag == NULL) {
			$tag_id = NULL;
		} else {
			$tag_id = implode(',',$tag);
		}
		
		$data = array('slug' => $titleURL, 'judul' => $judul, 'isi' =>$isi, 'kategori_id' => $kategori_id, 
					 'tag_id' => $tag_id, 'user_id' => $user_id, 'tgl' => $waktu, 'status' => $status);
		$this->db->insert('post', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Post"." ".$judul, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
		
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->join('divisi', 'kategori.divisi_id = divisi.id_divisi');
		$this->db->where('id_kategori', $kategori_id);
		$kat = $this->db->get()->row();
		return $kat->divisi;
	}
	public function delete($id){
		$this->db->where('id_post', $id);
		$this->db->update('post', array('status' => "0"));
		
		$this->db->where('id_post', $id);
		$ak = $this->db->get('post')->row();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Post"." ".$ak->judul, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id) {
		$this->db->where('id_post', $id);
		return $this->db->get('post')->row();
	}
	public function update(){
		$id = $this->input->post('id_post');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$kategori_id = $this->input->post('kategori_id');
		$tag = $this->input->post('tag_id');
		if($tag == NULL) {
			$tag_id = NULL;
		} else {
			$tag_id = implode(',',$tag);
		}
		$user_id = $this->session->userdata('user_id');
		$data = array('judul' => $judul, 'isi' => $isi, 'kategori_id' => $kategori_id, 'tag_id' => $tag_id);
		$this->db->where('id_post', $id);
		$this->db->update('post', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update Post"." ".$judul, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
		
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->join('divisi', 'kategori.divisi_id = divisi.id_divisi');
		$this->db->where('id_kategori', $kategori_id);
		$kat = $this->db->get()->row();
		return $kat->divisi;
	}
	public function cek($id) {
		$status = "1";
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('kategori', 'post.kategori_id = kategori.id_kategori');
		$this->db->join('user', 'post.user_id = user.id_user');
		$this->db->where('post.status', $status);
		$this->db->where('post.slug', $id);
		return $this->db->get()->row();
	}
	public function judul() {
		$status = 1;
		$judul = $this->input->post('judul');
		$this->db->like('judul', $judul);
		$this->db->where('status', $status);
		$this->db->order_by('tgl', "DESC");
		return $this->db->get('post')->result();
	}
	public function tag() {
		$status = 1;
		$id = $this->input->post('id');
		$this->db->like('tag_id', $id);
		$this->db->where('status', $status);
		$this->db->order_by('tgl', "DESC");
		return $this->db->get('post')->result();
	}
	public function search($id) {
		$status = 1;
		$judul = $this->input->post('judul');
		
		$this->db->like('divisi', $id);
		$divisi = $this->db->get('divisi')->row();
		
		$this->db->like('judul', $judul);
		$this->db->or_like('isi', $judul);
		$this->db->where('status', $status);
		$this->db->order_by('tgl', "DESC");
		$cek = $this->db->get('post')->result();
		$cekid = array();
		foreach($cek as $key) {
			$cekid[] = $key->id_post ;
		}
		$clear_array = array_unique($cekid);
		
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('kategori', 'post.kategori_id = kategori.id_kategori');
		$this->db->join('user', 'post.user_id = user.id_user');
		$this->db->where('post.status', $status);
		$this->db->where_in('post.id_post', $clear_array);
		$this->db->where('kategori.divisi_id', $divisi->id_divisi);
		$this->db->order_by('post.tgl', "DESC");
		return $this->db->get()->result();
	}
	public function divisi($id) {
		$status = "1";
		
		$this->db->like('divisi', $id);
		$divisi = $this->db->get('divisi')->row();
		
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('kategori', 'post.kategori_id = kategori.id_kategori');
		$this->db->join('user', 'post.user_id = user.id_user');
		$this->db->where('post.status', $status);
		$this->db->where('kategori.divisi_id', $divisi->id_divisi);
		$this->db->order_by('tgl', "DESC");
    return $this->db->get()->result();
	}
}