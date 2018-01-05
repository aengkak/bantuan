<?php
class Kategori extends CI_model {
	public function selectAll() {
		$status = "1";
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->join('divisi', 'kategori.divisi_id = divisi.id_divisi');
		$this->db->where('kategori.status', $status);
		$this->db->order_by('kategori.nama', "asc");
    return $this->db->get()->result();
  }
  public function json() {
	  $sesdev = $this->session->userdata('divisi_id');
	  $resd = explode(',',$sesdev);
	  $c = count($resd);
	  $status = 1;
	  $no = 1;
		$this->datatables->select('id_kategori,nama,kategori.status');
        $this->datatables->from('kategori');
		$this->datatables->where('kategori.status', $status);
		$this->datatables->join('divisi', 'kategori.divisi_id = divisi.id_divisi');
		$this->datatables->where('divisi.status', $status);
		foreach($resd as $key => $value) {
			if($no == 1) {
				$this->datatables->like('divisi.id_divisi', $value);
			} else {
				$this->datatables->or_like('divisi.id_divisi', $value);
			}
		$no++; }
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
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Tambah Kategori"." ".$nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function delete($id) {
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', array('status' => "0"));
		
		$this->db->where('id_kategori', $id);
		$ak = $this->db->get('kategori')->row();
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Delete Kategori"." ".$ak->nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function edit($id){
		$this->db->where('id_kategori', $id);
		return $this->db->get('kategori')->row();
	}
	public function update(){
		$id = $this->input->post('id_kategori');
		$nama = $this->input->post('nama');
		$divisi_id = $this->input->post('divisi_id');
		$data = array('nama' => $nama, 'divisi_id' => $divisi_id);
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
		
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$datalog = array('user_id' => $user_id, 'ket' => "Update Kategori"." ".$nama, 'tgl' => $date);
		$this->db->insert('log', $datalog);
		$this->db->insert_id();
	}
	public function divisi($id){
		$this->db->like('divisi', $id);
		$divisi = $this->db->get('divisi')->row();
		$status = "1";
		$this->db->where('status', $status);
		$this->db->where('kategori.divisi_id', $divisi->id_divisi);
		$this->db->order_by('nama', "asc");
    return $this->db->get('kategori')->result();
	}
}