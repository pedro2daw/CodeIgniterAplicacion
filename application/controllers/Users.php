<?php
    include_once('Security.php');
    class Users extends Security{
// ------- CARGO LA VISTA DEL LOGIN POR DEFECTO ------------ //        
        public function index(){
            $data["nombreVista"] = "login";
            $this->load->view('template',$data);
        }
// ------- CARGO LA VISTA DEL LOGIN POR DEFECTO ------------ //

// ***********************************************************//

// ------- COMPRUEBO EL LOGIN REALIZADO -------------------- //
        public function checkLogin(){
            if($this->security_check()){
            $nombre = $this->input->get_post("nombre");
            $pass = $this->input->get_post("password");
            $this->load->model('modelUser');
            $resultado = $this->modelUser->checkLogin($nombre,$pass); // LLAMO AL FUNCION checkLogin del modelUser con 2 parametros
            $data["nombreVista"] = "login";
            if($resultado == 0){
                $data["msg"] = "<h5 class='error'>Usuario o contraseña incorrectos</h5>";
                $this->load->view('template',$data);
            } else{
                $this->create_session();
                $this->panelAdministracion(); // llamo a la funcion que me mostrará las tablas de la BD
            }   
        }
    }
// ------- COMPRUEBO EL LOGIN REALIZADO -------------------- //

// ****************************************************************//

// ------- OBTENGO EL PANEL DE ADMINISTRACION -------------------- //
        public function panelAdministracion() {
            if($this->security_check()){
            $this->load->model('modelLugares');
            $this->load->model('modelPeliculas');
            $this->load->model('modelLocalizaciones');
            $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
            $data["listaPeliculas"] = $this->modelPeliculas->getAll();
            $data["listaLugares"] = $this->modelLugares->getAll();
            $data["nombreVista"] = "administracion";
            $this->load->view('template', $data);
            }
        }
// ------- OBTENGO EL PANEL DE ADMINISTRACION -------------------- //

// *********************************************************************//

// ------- COMPRUEBO SI EXISTE EL USUARIO CON AJAX -------------------- //
        public function check_user($user){
            $data["nombreVista"] = 'login';
            $this->load->view('template', $data);
            $this->load->model('modelAjax');

            $check = $this->modelAjax->check_user($user);

                if($check == 1){
                    $this->output->set_output("1");
                }else{
                    $this->output->set_output("0");
                }   
        }
// ------- COMPRUEBO SI EXISTE EL USUARIO CON AJAX -------------------- //

// *********************************************************************//

// ------- DESTRUYO LA SESION DE LA BASE DE DATOS -------------------- //
        public function cerrarSesion() {
            $this->destroy_session();
            $this->index();
        }
// ------- DESTRUYO LA SESION DE LA BASE DE DATOS -------------------- //


} //cierra class Users

