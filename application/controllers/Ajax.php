<?php

    class Ajax extends CI_Controller{

        public function check_user($user){
            $data["nombreVista"] = 'login';
            $this->load->view('template', $data);
            $this->load->model('modelAjax');
            $check = $this->modelAjax->check_user($user);

                if($check == 1){
                    $this->output->set_output("Usuario correcto");
                }else{
                    $this->output->set_output("El usuario no existe");
                }
            
        }



} // CIERRA LA CLASS Ajax
?>