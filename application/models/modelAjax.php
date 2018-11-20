<?php

    class modelAjax extends CI_Model{
        
        public function check_user($user){
            $query = $this->db->query("SELECT nombre FROM usuarios WHERE nombre='$user'");
                $user_exists = 0;

                if ($this->db->affected_rows() == 1){
                    $user_exists = 1;
                }
            return $user_exists;
        }
} // CIERRA LA CLASS modelAjax
?>