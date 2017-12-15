<?php
class User extends CI_model {
	public function selectAll() {
		$level = $this->session->userdata('level');
		if ($level == "staff") {
			$status = "1";
			$this->db->where('status', $status);
			return $this->db->get('user_supplier')->result();
		} elseif($level == "supplier") {
			$supplier_id = $this->session->userdata('supplier_id');
			$status = "1";
			$this->db->where('status', $status);
			$this->db->where('supplier_id', $supplier_id);
			return $this->db->get('user_supplier')->result();
		}
	}
	public function json() {
		$status = 1;
		$this->datatables->select('id_user,username,status');
		$this->datatables->where('status', $status);
        $this->datatables->from('user');
		$this->datatables->add_column('action', '<a href="#" onclick="ganti($1)" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a> 
		<a href="#" onclick="hapus($1)" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>', 'id_user');
        return $this->datatables->generate();
	}
	public function add() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses_id = $this->input->post('akses_id');
		$status = "1";

		$res = implode(",",$akses_id);
		$data = array('username' => $username,'password' => md5($password),
						'akses_id' => $res, 'status' => $status);
		$this->db->insert('user', $data);
		$this->db->insert_id();
	}
	public function delete($id){
		$this->db->where('id_user', $id);
		$this->db->update('user', array('status' => "0"));
	}
	public function edit($id){
		$this->db->where('id_user', $id);
		return $this->db->get('user')->row();
	}
	public function update(){
		$id = $this->input->post('id_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses_id = $this->input->post('akses_id');
		
		$res = implode(",",$akses_id);
		$user_id = $this->session->userdata('user_id');
		if ($password == NULL) {
			$data = array('username' => $username,
								'akses_id' => $res);
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		} else {
			$data = array('username' => $username,'password' => md5($password),
								'akses_id' => $res);
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		}

		if ($user_id == $id) {
			$this->session->set_userdata('akses_id', $res);
		}
	}
	public function cekpass() {
		$user_id = $this->session->userdata('user_id');
		$password = $this->input->post('lama');
		$this->db->where('password', md5($password));
		$this->db->where('id_user', $user_id);
		$data = $this->db->get('user')->row();
		if($data != NULL) {
			return 1;
		} else {
			return 0;
		}
	}
	public function updatepass() {
		$user_id = $this->session->userdata('user_id');
		$password = $this->input->post('password');
		$data = array('password' => md5($password));
		$this->db->where('id_user', $user_id);
		$this->db->update('user', $data);
	}
}
