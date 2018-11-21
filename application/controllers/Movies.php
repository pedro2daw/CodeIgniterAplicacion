<?php 
    include_once('Security.php');
    class Movies extends Security{

        public function __construct(){
            parent::__construct();
            $this->load->model('modelPeliculas');
            $this->load->model('modelLugares');
            $this->load->model('modelLocalizaciones');
        }
// ------- CARGO LA VISTA DEL FORMULARIO DE INSERCION DE PELICULAS ------------ //
        public function showInsertar(){
            if($this->security_check()){
                $data["nombreVista"] = "insertMovie";
                $this->load->view('template',$data);
            }
        }
// ------- CARGO LA VISTA DEL FORMULARIO DE INSERCION DE PELICULAS ------------ //

// ****************************************************************************//

// ------------- REALIZO LA INSERCION DE PELICULAS --------------------------- //
        public function insertMovie(){
            if($this->security_check()){
                
                $titulo = $this->input->get_post("titulo");
                $anyo = $this->input->get_post("anyo");
                $pais = $this->input->get_post("pais");
                $img_name = $this->modelPeliculas->checkUpload($titulo);
                $cartel = "assets/img/".$img_name;
                    
                $resultado = $this->modelPeliculas->insertMovie($titulo,$anyo,$pais,$cartel);
                    
                    if ($resultado == -1){
                        echo("<h3>Error al insertar la pelicula</h3>");
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableMovies";
                        $this->load->view('template',$data);
                    }else{                       
                        echo("<h3>Película insertada con éxito</h3>");
                        $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                        $data["listaLugares"] = $this->modelLugares->getAll();
                        $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableMovies";
                        $this->load->view('template', $data);
                    }
            }      
                }
// ------------- REALIZO LA INSERCION DE PELICULAS --------------------------- //

// ****************************************************************************//

// ------------- REALIZO LA ELIMINACION DE LAS PELICULAS ----------------------//
        public function deleteMovie($id){
            if($this->security_check()){
                $resultado = $this->modelPeliculas->deleteMovie($id);
                //var_dump($resultado);
                    if ($resultado == 0){
                        echo("<h3>Error al eliminar la pelicula</h3>");
                        
                        $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                        $data["listaLugares"] = $this->modelLugares->getAll();
                        $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableMovies";
                        $this->load->view('template', $data);
                    }else{
                        echo("<h3>Película eliminada con éxito</h3>");
                        $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                        $data["listaLugares"] = $this->modelLugares->getAll();
                        $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableMovies";
                        $this->load->view('template', $data);
                    }
            }
        }
// ------------- REALIZO LA ELIMINACION DE LAS PELICULAS ----------------------//

// ****************************************************************************//

// --------- CARGO LA VISTA DEL FORMULARIO DE MODIFICACION DE PELICULAS ----//
        public function showUpdate($id){
            if($this->security_check()){
                $data["nombreVista"] = "updateMovie";
                $data["movieData"]  = $this->modelPeliculas->getOne($id);
                $this->load->view('template', $data);
            }
        }
// --------- CARGO LA VISTA DEL FORMULARIO DE MODIFICACION DE PELICULAS ----//

// ****************************************************************************//

// --------- REALIZO LA MODIFICACION DE LAS PELICULAS ----------------------//
        public function updateMovie(){
            if($this->security_check()){
                $id = $this->input->get_post("id");
                $titulo = $this->input->get_post("titulo");
                $anyo = $this->input->get_post("anyo");
                $pais = $this->input->get_post("pais");

                $resultado = $this->modelPeliculas->updateMovie($id,$titulo,$anyo,$pais);

                    if ($resultado == 0){
                        echo("<h3>Error al modificar la pelicula</h3>");
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableMovies";
                        $this->load->view('template',$data);
                    }else{                       
                        echo("<h3>Película modificada con éxito</h3>");
                        $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                        $data["listaLugares"] = $this->modelLugares->getAll();
                        $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableMovies";
                        $this->load->view('template', $data);
                    }  
            }
        }
// --------- REALIZO LA MODIFICACION DE LAS PELICULAS ----------------------//


}// CIERRO LA CLASS MOVIES