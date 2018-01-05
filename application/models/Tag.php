<?php
class Tag extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		$this->db->order_by('tag', "asc");
    return $this->db->get('tag')->result();
  }
  public function json() {
	  $sesdev = $this->session->userdata('divisi_id');
	  $resd = explode(',',$sesdev);
	  $c = count($resd);
	  $status = 1;
	  $no = 1;
		$this->datatables->select('id_tag,tag');
		$this->datatables->join('kategori', 'tag.kategori_id = kategori.id_kategori');
		$this->datatables->where('tag.status', $status);
        $this->datatables->from('tag');
		foreach($resd as $key => $value) {
			if($no == 1) {
				$this->datatables->like('kategori.divisi_id', $value);
			} else {
				$this->datatables->or_like('kategori.divisi_id', $value);
			}
		$no++; }
		$this->datatables->select('nama');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_tag');
        $this->db->order_by('id_tag', "desc");
		return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$tag = $this->input->post('tag');
		$kategori_id = $this->input->post('kategori_id');
		$data = array('tag' => $tag, 'kategori_id' => $kategori_id, 'status' => $status);
		$this->db->insert('tag', $data);
		$this->db->insert_id();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Penanda"." ".$tag, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_tag', $id);
		$this->db->update('tag', array('status' => "0"));
		
		$this->db->where('id_tag', $id);
		$ak = $this->db->get('tag')->row();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Penanda"." ".$ak->tag, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_tag', $id);
		return $this->db->get('tag')->row();
	}
	public function update(){
		$id = $this->input->post('id_tag');
		$tag = $this->input->post('tag');
		$kategori_id = $this->input->post('kategori_id');
		$data = array('tag' => $tag, 'kategori_id' => $kategori_id);
		$this->db->where('id_tag', $id);
		$this->db->update('tag', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update Penanda"." ".$tag, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function kategori() {
		$id = $this->input->post('kategori_id');
		$this->db->where('kategori_id', $id);
		return $this->db->get('tag')->result();
	}
}
