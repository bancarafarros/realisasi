<?php

class MDashboard extends CI_Model {
    public function tampilData() {
        return $this->db->get('tb_kegiatan');
    }
}

?>