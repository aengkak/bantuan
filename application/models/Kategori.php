<?php
class Kategori extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		$this->db->order_by('nama', "asc");
    return $this->db->get('kategori')->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_kategori,nama,kategori.status');
        $this->datatables->from('kategori');
		$this->datatables->where('kategori.status', $status);
		$this->datatables->join('divisi', 'kategori.divisi_id = divisi.id_divisi');
		$this->datatables->where('divisi.status', $status);
		$this->datatables->select('divisi');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_kategori');
        return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$nama = $this->input->post('nama');
		$divisi_id = $this->input->post('divisi_id');
		$data = array('nama' => $nama, 'divisi_id' => $divisi_id, 'status' => $status);
		$this->db->insert('kategori', $data);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', array('status' => "0"));
	}
	public function edit($id){
		$this->db->where('id_kategori', $id);
		return $this->db->get('kategori')->row();
	}
	public function update(){
		$id = $this->input->post('id_kategori');
		$nama = $this->input->post('nama');
		$divisi_id = $this->input->post('divisi_id');
		$data = array('nama' => $nama, 'divisi' => $divisi_id);
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
	}
}
