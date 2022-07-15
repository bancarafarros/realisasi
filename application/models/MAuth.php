<?php

class MAuth extends CI_Model {
    public function cekLogin() {
        $username_pengguna = set_value('username_pengguna');
        $password_pengguna = set_value('password_pengguna');
        // $nama_pengguna = set_value('nama_pengguna');

        $result = $this->db->where('username_pengguna', $username_pengguna)
                            ->where('password_pengguna', $password_pengguna)
                            // ->where('nama_pengguna', $nama_pengguna)
                            ->limit(1)
                            ->get('tb_pengguna');

        if ($result->num_rows() > 0) {
            return $result->row();
        
        } else {
            return array();
        }
    }    
}

?>