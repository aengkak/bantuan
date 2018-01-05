<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('Akses');
		$this->load->model('User');
		$this->load->model('Kategori');
		$this->load->model('Post');
		$this->load->model('Tag');
		$this->load->model('Divisi');
		$this->load->model('Aktivitas');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$data['divisi'] = $this->Divisi->selectAll();
		$menu['akses'] = $this->Akses->selectAll();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
	public function pilih() {
		$data['divisi'] = $this->Divisi->selectAll();
		$menu['akses'] = $this->Akses->selectAll();
		$this->load->view('index', $data);
	}
	public function result($id = null)
	{
		if (null !== $id) {
			} else {
				redirect(base_url());
		}
		$id_divisi = $this->uri->segment('2');
		if($_POST==NULL) {
			
			$arr = array();
		$data1 = $this->Post->divisi($id_divisi);
		foreach ($data1 as $key1) {
			$arr[] = array('value' => $key1->judul, 'label' => $key1->judul, 'addr' => $key1->nama, 'desc'=> "");
		}
		$data["linkpost"] = $id_divisi;
		$data['kategori'] = $this->Kategori->divisi($id_divisi);
		$data['post'] = $this->Post->divisi($id_divisi);
		$data['res'] = json_encode($arr);
		$data['tag'] = $this->Tag->selectAll();
		$data['divisi'] = $this->Divisi->pilih($id_divisi);
		$menu['akses'] = $this->Akses->selectAll();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('faq', $data);
		$this->load->view('template/footer');
		} else {
			if($this->input->post('id') != NULL) {
				$data['post'] = $this->Post->tag();
				$data['divisi'] = $this->Divisi->pilih($id_divisi);
				$data['cek'] = 0;
			} else {
				$data['kata'] = $this->input->post('judul') ;
				$data['cek'] = 1;
				$data['divisi'] = $this->Divisi->pilih($id_divisi);
				$data['post'] = $this->Post->search($id_divisi);
			}
			$this->load->view('modal/search', $data);
		}
	}
	public function faq($id = null)
	{
		if (null !== $id) {
			} else {
				redirect(base_url());
		}
		$id_divisi = $this->uri->segment('2');
		if($_POST==NULL) {
			
			$arr = array();
		$data1 = $this->Post->divisi($id_divisi);
		foreach ($data1 as $key1) {
			$arr[] = array('value' => $key1->judul, 'label' => $key1->judul, 'addr' => $key1->nama, 'desc'=> "");
		}
		$data["linkpost"] = $id_divisi;
		$data['kategori'] = $this->Kategori->divisi($id_divisi);
		$data['post'] = $this->Post->divisi($id_divisi);
		$data['res'] = json_encode($arr);
		$data['tag'] = $this->Tag->selectAll();
		$data['divisi'] = $this->Divisi->pilih($id_divisi);
		$menu['akses'] = $this->Akses->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('faq', $data);
		//$this->load->view('template/footer');
		} else {
			if($this->input->post('id') != NULL) {
				$data['post'] = $this->Post->tag();
				$data['divisi'] = $this->Divisi->pilih($id_divisi);
				$data['cek'] = 0;
			} else {
				$data['kata'] = $this->input->post('judul') ;
				$data['cek'] = 1;
				$data['divisi'] = $this->Divisi->pilih($id_divisi);
				$data['post'] = $this->Post->search($id_divisi);
			}
			$this->load->view('modal/search', $data);
		}
	}
	public function home()
	{
		$menu['akses'] = $this->Akses->selectAll();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('home');
		$this->load->view('template/footer');
	}
	public function login() {
		if($_POST != NULL) {
			$this->Login->log();
			$q = $this->session->userdata('status');
			if($q == "login") {
				redirect(base_url());
			} else {
				echo "<script>alert('Username/Password salah')
				location.replace('')</script>";
			}
		} else {
			$this->load->view('login');
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
	public function user() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "user") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$menu['akses'] = $this->Akses->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('user');
		//$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	function jsonuser(){
		header('Content-Type: application/json');
        $data = $this->User->json();
		print_r($data);
    }
	public function modaluser() {
		$data['cek'] = 0;
		$data['akses'] = $this->Akses->selectAll();
		$data['divisi'] = $this->Divisi->selectAll();
		$this->load->view('modal/user', $data);
	}
	public function adduser() {
		$this->User->add();
		echo json_encode(array("status" => TRUE));
	}
	public function edituser($id) {
		$data['cek'] = 1;
		$data['akses'] = $this->Akses->selectAll();
		$data['divisi'] = $this->Divisi->selectAll();
		$data['user'] = $this->User->edit($id);
		$this->load->view('modal/user', $data);
	}
	public function deleteuser($id) {
		$this->User->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updateuser() {
		$this->User->update();
		echo json_encode(array("status" => TRUE));
	}
	public function kategori() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "kategori") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$menu['akses'] = $this->Akses->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('kategori');
		//$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	function jsonkategori(){
		header('Content-Type: application/json');
        $data = $this->Kategori->json();
		print_r($data);
    }
	public function modalkategori() {
		$data['cek'] = 0;
		$data['divisi'] = $this->Divisi->selectAll();
		$this->load->view('modal/kategori', $data);
	}
	public function addkategori() {
		$this->Kategori->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editkategori($id) {
		$data['cek'] = 1;
		$data['kategori'] = $this->Kategori->edit($id);
		$data['divisi'] = $this->Divisi->selectAll();
		$this->load->view('modal/kategori', $data);
	}
	public function deletekategori($id) {
		$this->Kategori->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updatekategori() {
		$this->Kategori->update();
		echo json_encode(array("status" => TRUE));
	}
	public function akses() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "akses") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$menu['akses'] = $this->Akses->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('akses');
		//$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	function jsonakses(){
		header('Content-Type: application/json');
        $data = $this->Akses->json();
		print_r($data);
    }
	public function modalakses() {
		$data['cek'] = 0;
		$this->load->view('modal/akses', $data);
	}
	public function addakses() {
		$this->Akses->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editakses($id) {
		$data['cek'] = 1;
		$data['akses'] = $this->Akses->edit($id);
		$this->load->view('modal/akses', $data);
	}
	public function deleteakses($id) {
		$this->Akses->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updateakses() {
		$this->Akses->update();
		echo json_encode(array("status" => TRUE));
	}
	public function post() {
		$menu['akses'] = $this->Akses->selectAll();
		$data['post'] = $this->Post->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('post', $data);
		//$this->load->view('template/footer');
	}
	public function postingan() {
		$menu['akses'] = $this->Akses->selectAll();
		$data['post'] = $this->Post->selectAll();
		$this->load->view('template/header');
		$this->load->view('template/menu', $menu);
		$this->load->view('post', $data);
		$this->load->view('template/footer');
	}
	function jsonpost(){
		header('Content-Type: application/json');
        $data = $this->Post->json();
		print_r($data);
    }
	public function addpost() {
		if($_POST != NULL) {
			$data = $this->Post->add();
			echo "<script>alert('Sukses')
				location.replace('result/".$data."')</script>";
		} else {
			$data['kategori'] = $this->Kategori->selectAll();
			$data['cek'] = 0;
			$menu['akses'] = $this->Akses->selectAll();
			$this->load->view('template/header');
			$this->load->view('template/menu', $menu);
			$this->load->view('modal/post', $data);
			$this->load->view('template/footer');
		}
	}
	public function addpostlg() {
		if($_POST != NULL) {
			$data = $this->Post->add();
			echo $data;
		} else {
			$data['kategori'] = $this->Kategori->selectAll();
			$data['cek'] = 0;
			$menu['akses'] = $this->Akses->selectAll();
			$this->load->view('modal/post', $data);
		}
	}
	public function editpost($id) {
		if($_POST != NULL) {
			$data = $this->Post->update();
			echo "<script>alert('Sukses')
				location.replace('../result/".$data."')</script>";
		} else {
			$data['cek'] = 1;
			$data['kategori'] = $this->Kategori->selectAll();
			$data['post'] = $this->Post->edit($id);
			$menu['akses'] = $this->Akses->selectAll();
			$this->load->view('template/header');
			$this->load->view('template/menu', $menu);
			$this->load->view('modal/post', $data);
			$this->load->view('template/footer');
		}
	}
	public function editpostlg($id) {
		if($_POST != NULL) {
			$data = $this->Post->update();
			echo $data;
		} else {
			$data['cek'] = 1;
			$data['kategori'] = $this->Kategori->selectAll();
			$data['post'] = $this->Post->edit($id);
			$menu['akses'] = $this->Akses->selectAll();
			$this->load->view('modal/post', $data);
		}
	}
	public function deletepost($id) {
		$this->Post->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function read($id = null) {
		if (null !== $id) {
			$data['read'] = $this->Post->cek($id);
			if ($data['read'] != NULL) {
				$data['kategori'] = $this->Kategori->selectAll();
				$data['post'] = $this->Post->selectAll();
				$menu['akses'] = $this->Akses->selectAll();
				//$this->load->view('template/header');
				//$this->load->view('template/menu', $menu);
				$this->load->view('read', $data);
				//$this->load->view('template/footer');
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}
	public function penanda() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "penanda") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$menu['akses'] = $this->Akses->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('tag');
		//$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	function jsontag(){
		header('Content-Type: application/json');
        $data = $this->Tag->json();
		print_r($data);
    }
	public function modaltag() {
		$data['kategori'] = $this->Kategori->selectAll();
		$data['cek'] = 0;
		$this->load->view('modal/tag', $data);
	}
	public function addtag() {
		$this->Tag->add();
		echo json_encode(array("status" => TRUE));
	}
	public function edittag($id) {
		$data['kategori'] = $this->Kategori->selectAll();
		$data['cek'] = 1;
		$data['tag'] = $this->Tag->edit($id);
		$this->load->view('modal/tag', $data);
	}
	public function deletetag($id) {
		$this->Tag->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updatetag() {
		$this->Tag->update();
		echo json_encode(array("status" => TRUE));
	}
	public function search() {
		$data['cek'] = 0;
		$data['post'] = $this->Post->judul();
		$data['divisi'] = $this->Divisi->pilih($id_divisi);
		$this->load->view('modal/search', $data);
	}
	public function posttag() {
		$data['tag'] = $this->Tag->kategori();
		$data['cek'] = $this->input->post('cek');
		if($data['cek'] > 0) {
			$id = $this->input->post('id_post');
			$data['post'] = $this->Post->edit($id);
			$this->load->view('modal/posttag', $data);
		}else {
			$this->load->view('modal/posttag', $data);
		}
	}
	public function filtertag() {
		$id_divisi = $this->input->post('id_divisi');
		$data['cek'] = 0;
		$data['post'] = $this->Post->tag();
		$data['divisi'] = $this->Divisi->pilih($id_divisi);
		$this->load->view('modal/search', $data);
	}
	public function cekpass() {
		$cek = $this->User->cekpass();
		echo $cek;
	}
	public function updatepass() {
		$this->User->updatepass();
		echo json_encode(array("status" => TRUE));
	}
	public function divisi() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "kategori") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$menu['akses'] = $this->Akses->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view('divisi');
		//$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	function jsondivisi(){
		header('Content-Type: application/json');
        $data = $this->Divisi->json();
		print_r($data);
    }
	public function modaldivisi() {
		$data['cek'] = 0;
		$this->load->view('modal/divisi', $data);
	}
	public function adddivisi() {
		$this->Divisi->add();
		echo json_encode(array("status" => TRUE));
	}
	public function editdivisi($id) {
		$data['cek'] = 1;
		$data['divisi'] = $this->Divisi->edit($id);
		$this->load->view('modal/divisi', $data);
	}
	public function deletedivisi($id) {
		$this->Divisi->delete($id);
		echo json_encode(array("status" => TRUE));
	}
	public function updatedivisi() {
		$this->Divisi->update();
		echo json_encode(array("status" => TRUE));
	}
	public function aktivitas() {
		$akses_id = $this->session->userdata('akses_id');
		$res1 = explode(',',$akses_id);
		foreach ($res1 as $key => $value) {
			$cek = $this->Akses->cek($value);
			if (strtolower($cek->akses) == "aktivitas") {
				$count = $cek->akses;
			}
		}
		$counting = count($count);
		if ($counting > 0) {
		$menu['akses'] = $this->Akses->selectAll();
		//$this->load->view('template/header');
		//$this->load->view('template/menu', $menu);
		$this->load->view("aktivitas");
		//$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
	function jsonaktivitas(){
		header('Content-Type: application/json');
        $data = $this->Aktivitas->json();
		print_r($data);
    }
	public function checkses() {
		$ses = $this->session->userdata('status');
		if ($ses != "login") {
			echo 0;
		} else {
			echo 1;
		}
	}
}