<?php

class CPPTK extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('id_jabatan') != '2') {
            redirect(base_url('CAuth'));
        }
    }

        public function index() {
            $data['kegiatan']= $this->MPPTK->tampilData()->result();
            $data['pagu_anggaran'] = $this->MKegiatanCRUD->sum('tb_kegiatan', 'pagu_anggaran', );
            $data['nominal'] = $this->MKegiatanCRUD->sum('tb_kegiatan', 'nominal', );

            $this->load->view('pptk/VHeader');
            $this->load->view('pptk/VSidebar');
            $this->load->view('pptk/VPPTK', $data);
            $this->load->view('pptk/VFooter');
        }

        public function halamanInput($id_kegiatan) {
            $where = array('id_kegiatan' => $id_kegiatan);
            $data['kegiatan'] = $this->MPPTK->halamanInput($where, 'tb_kegiatan')->result();

            $this->load->view('/pptk/VHeader');
            $this->load->view('/pptk/VSidebar');
            $this->load->view('/pptk/VTagihan', $data);
            $this->load->view('/pptk/VFooter');
        }

        public function fungsiInput() {
            $id_kegiatan = $this->input->post('id_kegiatan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $sub_kegiatan = $this->input->post('sub_kegiatan');
            $nama_belanja = $this->input->post('nama_belanja');
            $kode_rekening = $this->input->post('kode_rekening');
            $pagu_anggaran = $this->input->post('pagu_anggaran');
            $nama_pptk = $this->input->post('nama_pptk');
            $tanggal_input = $this->input->post('tanggal_input');
    
            $config['upload_path'] = './uploads/bukti_tagihan/';
            $config['allowed_types'] = 'jpeg|jpg|png|gif|pdf';
            $config['max_size']             = 1000000;
            $config['max_width']            = 1000000;
            $config['max_height']           = 1000000;
    
            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $file = $this->upload->do_upload('bukti_tagihan');
            $data = $this->upload->data();
            
            if ($file) {    
                $data = $this->upload->data();
                $bukti_tagihan = $data['file_name'];
            
            } else {
                $bukti_tagihan = $this->input->post('bukti_tagihan');    
            }
    
            print_r($bukti_tagihan);
    
            $ArrInput = array(
                'id_kegiatan' => $id_kegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'sub_kegiatan' => $sub_kegiatan,
                'nama_belanja' => $nama_belanja,
                'kode_rekening' => $kode_rekening,
                'pagu_anggaran' => $pagu_anggaran,
                'nama_pptk' => $nama_pptk,
                'tanggal_input' => $tanggal_input,
                'bukti_tagihan' => $bukti_tagihan,
            );
    
            // $this->MForm->updateDataBaju($id, $ArrInput);
            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->update('tb_kegiatan', $ArrInput);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('pptk/CPPTK'));
        }

}

?>


