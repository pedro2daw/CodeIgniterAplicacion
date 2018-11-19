<?php

    class modelAjax extends CI_Model{
        
        public function check_user($user){
            $query = $this->db->query("SELECT nombre FROM usuarios WHERE nombre='$nombre'");

            return $query->num_rows();
        }
} // CIERRA LA CLASS modelAjax