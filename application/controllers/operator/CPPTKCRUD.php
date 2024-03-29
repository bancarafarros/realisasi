<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CPPTKCRUD extends CI_Controller {

	public function __construct() {
        parent::__construct();

        if ($this->session->userdata('id_jabatan') != '1') {
            redirect(base_url('CAuth'));
        }
    }

	public function index() {
	$datat['title']='Halaman Tugas';
	// $data['pptk']=$this->MPPTKCRUD->semuadata();
	$this->load->model('MPPTKCRUD');
    $data['pptk']= $this->MPPTKCRUD->tampilData()->result();
    $this->load->view('operator/VHeader',$datat);
    $this->load->view('operator/VSidebar');
	$this->load->view('operator/VPPTKCRUD',$data);
    $this->load->view('operator/VFooter');
	}

	public function fungsiTambah() {
        $id_pengguna = $this->input->post('id_pengguna');
        $nama_pengguna = $this->input->post('nama_pengguna');
		$kode_rek = $this->input->post('kode_rek');
		$jabatan_pengguna = 'PPTK';
		$pengguna_status = $this->input->post('pengguna_status');
		$username_pengguna = $this->input->post('username_pengguna');
        $password_pengguna = $this->input->post('password_pengguna');

        $ArrInsert = array(
        'id_pengguna' => $id_pengguna,
        'nama_pengguna' => $nama_pengguna,
		'kode_rek' => $kode_rek,
		'jabatan_pengguna' => $jabatan_pengguna,
		'pengguna_status' => $pengguna_status,
		'username_pengguna' => $username_pengguna,
        'password_pengguna' => $password_pengguna,
        );

        $this->db->insert('tb_pengguna', $ArrInsert);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil disimpan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('operator/CPPTKCRUD/index'));
    }

	public function halamanUpdate($id_pengguna) {
		$where = array('id_pengguna' => $id_pengguna);
		$this->load->model('MPPTKCRUD');
		$data['pptk'] = $this->MPPTKCRUD->halamanUpdate($where, 'tb_pengguna')->result();
		$this->load->view('/operator/VHeader');
		$this->load->view('/operator/VSidebar');
		$this->load->view('/operator/VPPTKUpdate', $data);
		$this->load->view('/operator/VFooter');
	}

	public function fungsiUpdate() {
		$id_pengguna = $this->input->post('id_pengguna');
        $nama_pengguna = $this->input->post('nama_pengguna');
		$kode_rek = $this->input->post('kode_rek');
		$jabatan_pengguna = 'PPTK';
		$pengguna_status = $this->input->post('pengguna_status');
		$username_pengguna = $this->input->post('username_pengguna');
        $password_pengguna = $this->input->post('password_pengguna');

        $ArrUpdate = array(
        'id_pengguna' => $id_pengguna,
        'nama_pengguna' => $nama_pengguna,
		'kode_rek' => $kode_rek,
		'jabatan_pengguna' => $jabatan_pengguna,
		'pengguna_status' => $pengguna_status,
		'username_pengguna' => $username_pengguna,
        'password_pengguna' => $password_pengguna,
        );

		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('tb_pengguna', $ArrUpdate);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil diubah</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect(base_url('operator/CPPTKCRUD/index'));
	}

	public function fungsiDelete($id_pengguna) {
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->delete('tb_pengguna');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil dihapus</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect(base_url('operator/CPPTKCRUD/index'));
	}
public function print(){
        $data['pptk'] = $this->MLaporan->laporan_pptk('tb_pengguna')->result();
        $this->load->view('operator/print_pptk', $data);
      }
}

?>