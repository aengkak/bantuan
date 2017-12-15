<?php
class Post extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('kategori', 'post.kategori_id = kategori.id_kategori');
		$this->db->join('user', 'post.user_id = user.id_user');
		$this->db->where('post.status', $status);
		$this->db->order_by('tgl', "DESC");
    return $this->db->get()->result();
  }
  public function json() {
		$status = 1;
		$this->datatables->select('id_post,slug,judul,isi,user_id,tgl');
        $this->datatables->from('post');
		$this->datatables->join('user', 'post.user_id = user.id_user');
		$this->datatables->where('post.status', $status);
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
	}
	public function delete($id){
		$this->db->where('id_post', $id);
		$this->db->update('post', array('status' => "0"));
	}
	public function edit($id){
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
	public function search() {
		$status = 1;
		$judul = $this->input->post('judul');
		$this->db->like('judul', $judul);
		$this->db->or_like('isi', $judul);
		$this->db->where('status', $status);
		$this->db->order_by('tgl', "DESC");
		return $this->db->get('post')->result();
	}
}