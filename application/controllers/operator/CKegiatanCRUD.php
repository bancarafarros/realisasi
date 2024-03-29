<?php

    class CKegiatanCRUD extends CI_Controller {

        public function __construct() {
            parent::__construct();
    
            if ($this->session->userdata('id_jabatan') != '1') {
                redirect(base_url('CAuth'));
            }
        }

        public function index() {
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->MKegiatanCRUD->tampilData()->result();
            
            $data['user'] = $this->MPPTKCRUD->tampilData()->result();
            $data['keg'] = $this->MKegiatanCRUD->count('tb_kegiatan');
            $data['bukti_tagihan'] = $this->MKegiatanCRUD->count('tb_kegiatan', 'bukti_tagihan');
            $data['bukti_transfer'] = $this->MKegiatanCRUD->count('tb_kegiatan', 'bukti_transfer') ;
            $data['pagu_anggaran'] = $this->MKegiatanCRUD->sum('tb_kegiatan', 'pagu_anggaran', );
            $data['nominal'] = $this->MKegiatanCRUD->sum('tb_kegiatan', 'nominal', );
            $data['PPTK'] = $this->MKegiatanCRUD->count('tb_pengguna', ' PPTK') ;
            

            $this->load->view('operator/VHeader');
            $this->load->view('operator/VSidebar');
            $this->load->view('operator/VKegiatanCRUD', $data);
            $this->load->view('operator/VFooter');
        }

        public function fungsiTambah() {
            $id_kegiatan = $this->input->post('id_kegiatan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $sub_kegiatan = $this->input->post('sub_kegiatan');
            $nama_belanja = $this->input->post('nama_belanja');
            $kode_rekening = $this->input->post('kode_rekening');
            $pagu_anggaran = $this->input->post('pagu_anggaran');
            $nama_pptk = $this->input->post('nama_pptk');
            $tanggal_input = $this->input->post('tanggal_input');
            
            $ArrInsert = array(
                'id_kegiatan' => $id_kegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'sub_kegiatan' => $sub_kegiatan,
                'nama_belanja' => $nama_belanja,
                'kode_rekening' => $kode_rekening,
                'pagu_anggaran' => $pagu_anggaran,
                'nama_pptk' => $nama_pptk,
                'tanggal_input' => $tanggal_input,
            );
    
            // $this->MForm->insertDataBaju($ArrInsert);
            $this->db->insert('tb_kegiatan', $ArrInsert);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('operator/CKegiatanCRUD/index'));
        }

        // public function fungsiTambah() {
        //     $this->load->library('form_validation');

        //     $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required',
        //     array('required' => '%s harus diisi'));

        //     $this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'required',
        //     array('required' => '%s harus diisi'));

        //     $this->form_validation->set_rules('nama_belanja', 'Nama Belanja', 'required',
        //     array('required' => '%s harus diisi'));
    
        //     $this->form_validation->set_rules('kode_rekening', 'Kode Rekening', 'required',
        //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan angka saja'));

        //     $this->form_validation->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
        //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan angka saja'));

        //     $this->form_validation->set_rules('nama_pptk', 'Nama PPTK', 'required',
        //     array('required' => '%s harus diisi'));

        //     $this->form_validation->set_rules('tanggal_input', 'Tanggal Input', 'required',
        //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan tanggal saja'));

        //     if ($this->form_validation->run() == FALSE) {
        //         $this->load->view('operator/VKegiatanCRUD');
    
        //     } else {
        //         $id_kegiatan = $this->input->post('id_kegiatan');
        //         $nama_kegiatan = $this->input->post('nama_kegiatan');
        //         $sub_kegiatan = $this->input->post('sub_kegiatan');
        //         $nama_belanja = $this->input->post('nama_belanja');
        //         $kode_rekening = $this->input->post('kode_rekening');
        //         $pagu_anggaran = $this->input->post('pagu_anggaran');
        //         $nama_pptk = $this->input->post('nama_pptk');
        //         $tanggal_input = $this->input->post('tanggal_input');
            
        //         $ArrInsert = array(
        //             'id_kegiatan' => $id_kegiatan,
        //             'nama_kegiatan' => $nama_kegiatan,
        //             'sub_kegiatan' => $sub_kegiatan,
        //             'nama_belanja' => $nama_belanja,
        //             'kode_rekening' => $kode_rekening,
        //             'pagu_anggaran' => $pagu_anggaran,
        //             'nama_pptk' => $nama_pptk,
        //             'tanggal_input' => $tanggal_input,
        //         );
    
        //         // $this->MForm->insertDataBaju($ArrInsert);
        //         $this->db->insert('tb_kegiatan', $ArrInsert);
        //         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //         <strong>Data berhasil disimpan</strong>
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //         </button>
        //         </div>');
        //         redirect(base_url('operator/CKegiatanCRUD/index'));
        //     }
        // }

        public function halamanDetail($id_kegiatan) {
            $where = array('id_kegiatan' => $id_kegiatan);
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->MKegiatanCRUD->halamanUpdate($where, 'tb_kegiatan')->result();
            $this->load->view('/operator/VHeader');
            $this->load->view('/operator/VSidebar');
            $this->load->view('/operator/VKegiatanDetail', $data);
            $this->load->view('/operator/VFooter');
        }

        public function halamanUpdate($id_kegiatan) {
            $where = array('id_kegiatan' => $id_kegiatan);
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->MKegiatanCRUD->halamanUpdate($where, 'tb_kegiatan')->result();
            $this->load->view('/operator/VHeader');
            $this->load->view('/operator/VSidebar');
            $this->load->view('/operator/VKegiatanUpdate', $data);
            $this->load->view('/operator/VFooter');
        }
    
        public function fungsiUpdate() {
            $id_kegiatan = $this->input->post('id_kegiatan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $sub_kegiatan = $this->input->post('sub_kegiatan');
            $nama_belanja = $this->input->post('nama_belanja');
            $kode_rekening = $this->input->post('kode_rekening');
            $pagu_anggaran = $this->input->post('pagu_anggaran');
            $nama_pptk = $this->input->post('nama_pptk');
            $tanggal_input = $this->input->post('tanggal_input');
            
            $ArrUpdate = array(
                'id_kegiatan' => $id_kegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'sub_kegiatan' => $sub_kegiatan,
                'nama_belanja' => $nama_belanja,
                'kode_rekening' => $kode_rekening,
                'pagu_anggaran' => $pagu_anggaran,
                'nama_pptk' => $nama_pptk,
                'tanggal_input' => $tanggal_input,
            );

            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->update('tb_kegiatan', $ArrUpdate);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('operator/CKegiatanCRUD/index'));
        }

        public function fungsiDelete($id_kegiatan) {
            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->delete('tb_kegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		    <strong>Data berhasil dihapus</strong>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		    </button>
		    </div>');
            redirect(base_url('operator/CKegiatanCRUD/index'));
        }
 public function print(){
        $data['kegiatan'] = $this->MKegiatanCRUD->tampilData('tb_kegiatan')->result();
        $this->load->view('operator/print_kegiatan_operator', $data);
      }
    }
