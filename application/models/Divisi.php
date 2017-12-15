<?php
class Divisi extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->where('status', $status);
		$this->db->order_by('divisi', "asc");
    return $this->db->get('divisi')->result();
  }
  public function json() {
	  $status = 1;
		$this->datatables->select('id_divisi,divisi,status');
		$this->datatables->where('status', $status);
        $this->datatables->from('divisi');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_divisi');
        return $this->datatables->generate();
  }
  public function add() {
		$status = "1";
		$divisi = $this->input->post('divisi');
		$data = array('divisi' => $divisi, 'status' => $status);
		$this->db->insert('divisi', $data);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_divisi', $id);
		$this->db->update('divisi', array('status' => "0"));
	}
	public function edit($id){
		$this->db->where('id_divisi', $id);
		return $this->db->get('divisi')->row();
	}
	public function update(){
		$id = $this->input->post('id_divisi');
		$divisi = $this->input->post('divisi');
		$data = array('divisi' => $divisi);
		$this->db->where('id_divisi', $id);
		$this->db->update('divisi', $data);
	}
}