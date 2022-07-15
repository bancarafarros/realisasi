<?php

class CAuth extends CI_Controller {
    public function index() {
        $this->load->view('VAuth');
    }

    public function login() {
        $auth = $this->mauth->cekLogin();

        if ($auth == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NGA DULU XOB</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('CAuth/index'));

            } else {
                $this->session->set_userdata('nama_pengguna', $auth->nama_pengguna);
                $this->session->set_userdata('username_pengguna', $auth->username_pengguna);
                $this->session->set_userdata('id_jabatan', $auth->id_jabatan);

                switch ($auth->id_jabatan) {
                    case 1: redirect(base_url('operator/CKegiatanCRUD'));
                        break;

                    case 2: redirect(base_url('pptk/CPPTK'));
                        break;

                    case 3: redirect(base_url('bendahara/CBendahara'));
                        break;
                    
                    default: break;
            }
        }
        
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('CDashboard/index'));
    }

}

?>