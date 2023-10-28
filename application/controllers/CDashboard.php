<?php

class CDashboard extends CI_Controller {

    public function index () {
        $data['kegiatan']= $this->MDashboard->tampilData()->result();

        $this->load->view('VHeader');
        $this->load->view('VSidebar');
        $this->load->view('VAtasan', $data);
        $this->load->view('VFooter');
    }

}
?>