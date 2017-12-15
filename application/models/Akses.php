<?php
class Akses extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		$this->db->order_by('akses', "asc");
    return $this->db->get('akses')->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_akses,akses,status');
		$this->datatables->where('status', $status);
        $this->datatables->from('akses');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_akses');
        return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$akses = $this->input->post('akses');
		$data = array('akses' => $akses, 'status' => $status);
		$this->db->insert('akses', $data);
		$this->db->insert_id();

	}
	public function delete($id){
		$this->db->where('id_akses', $id);
		$this->db->update('akses', array('status' => "0"));
	}
	public function edit($id){
		$this->db->where('id_akses', $id);
		return $this->db->get('akses')->row();
	}
	public function update(){
		$id = $this->input->post('id_akses');
		$akses = $this->input->post('akses');
		$data = array('akses' => $akses);
		$this->db->where('id_akses', $id);
		$this->db->update('akses', $data);
	}
}
