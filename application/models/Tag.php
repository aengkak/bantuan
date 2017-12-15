<?php
class Tag extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		$this->db->order_by('tag', "asc");
    return $this->db->get('tag')->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_tag,tag');
		$this->datatables->join('kategori', 'tag.kategori_id = kategori.id_kategori');
		$this->datatables->where('tag.status', $status);
        $this->datatables->from('tag');
		$this->datatables->select('nama');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_tag');
        return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$tag = $this->input->post('tag');
		$kategori_id = $this->input->post('kategori_id');
		$data = array('tag' => $tag, 'kategori_id' => $kategori_id, 'status' => $status);
		$this->db->insert('tag', $data);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_tag', $id);
		$this->db->update('tag', array('status' => "0"));
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
	}
	public function kategori() {
		$id = $this->input->post('kategori_id');
		$this->db->where('kategori_id', $id);
		return $this->db->get('tag')->result();
	}
}
