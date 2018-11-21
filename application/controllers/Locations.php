<?php 
    include_once('Security.php');
    class Locations extends Security{

        public function __construct(){
            parent::__construct();
            $this->load->model('modelPeliculas');
            $this->load->model('modelLugares');
            $this->load->model('modelLocalizaciones');
        }

// ------- CARGO LA VISTA DEL FORMULARIO DE INSERCION DE LOCALIZACIONES ------------ //
        public function showInsertar(){
            if($this->security_check()){
                $data["nameMovie"] = $this->modelPeliculas->getName();
                $data["namePlace"] = $this->modelLugares->getName();
                $data["nombreVista"] = "insertLocation";
                $this->load->view('template',$data);
            }
        }
// ------- CARGO LA VISTA DEL FORMULARIO DE INSERCION DE LOCALIZACIONES ------------ //

// ****************************************************************************//

// ------------- REALIZO LA INSERCION DE LOCALIZACIONES --------------------------- //
        public function insertLocation(){
            if($this->security_check()){
                $img_name = $this->modelLocalizaciones->checkUpload();
                $nombre = $this->input->get_post("nombre");
                $descripcion = $this->input->get_post("descripcion");
                $lugar = $this->input->get_post("lugar");
                $pelicula = $this->input->get_post("pelicula");
                $imagen = "assets/img/".$img_name;
                    
                $resultado = $this->modelLocalizaciones->insertLocation($nombre,$descripcion,$lugar,$pelicula,$imagen);
                    
                    if ($resultado == -1){
                        echo("<h3>Error al insertar la localizacion</h3>");
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableLocations";
                        $this->load->view('template',$data);
                    }else{                       
                        echo("<h3>Localización insertada con éxito</h3>");
                        $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                        $data["listaLugares"] = $this->modelLugares->getAll();
                        $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableLocations";
                        $this->load->view('template', $data);
                    }
            }      
        }
// ------------- REALIZO LA INSERCION DE LOCALIZACIONES --------------------------- //

// ****************************************************************************//

// ------------- REALIZO LA ELIMINACION DE LAS LOCALIZACIONES ----------------------//
        public function deleteLocation($id){
            if($this->security_check()){
                $resultado = $this->modelLocalizaciones->deleteLocation($id);
                $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                $data["listaLugares"] = $this->modelLugares->getAll();
                $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                $data["nombreVista"] = "administracion";
                $data["table_to_show"] = "tableLocations";
                if ($resultado == 0){
                    echo("<h3>Error al eliminar la Localizacion</h3>");
                    $this->load->view('template', $data);
                }else{
                    echo("<h3>Localización eliminada con éxito</h3>");
                    $this->load->view('template', $data);
                }
            }
        }
// ------------- REALIZO LA ELIMINACION DE LAS LOCALIZACIONES ----------------------//

// ****************************************************************************//

// --------- CARGO LA VISTA DEL FORMULARIO DE MODIFICACION DE PELICULAS ----//
        public function showUpdate($id){
            if($this->security_check()){
                $data["nombreVista"] = "updateLocation";
                $data["locationData"]  = $this->modelLocalizaciones->getOne($id);
                $data["nameMovie"] = $this->modelPeliculas->getName();
                $data["namePlace"] = $this->modelLugares->getName();
                $this->load->view('template', $data);
            }
        }
// --------- CARGO LA VISTA DEL FORMULARIO DE MODIFICACION DE PELICULAS ----//

// ****************************************************************************//

// --------- REALIZO LA MODIFICACION DE LAS LOCALIZACIONES ----------------------//
        public function updateLocation(){
            if($this->security_check()){
                $id = $this->input->get_post("id");
                $nombre = $this->input->get_post("nombre");
                $descripcion = $this->input->get_post("descripcion");
                $fotografia = $this->input->get_post("ruta");
                $lugar = $this->input->get_post("lugar");
                $pelicula = $this->input->get_post("pelicula");

                $resultado = $this->modelLocalizaciones->updateLocation($id,$nombre,$descripcion,$fotografia,$lugar,$pelicula);

                    if ($resultado == 0){
                        echo("<h3>Error al modificar la localizacion</h3>");
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableLocations";
                        $this->load->view('template',$data);
                    }else{                       
                        $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                        $data["listaLugares"] = $this->modelLugares->getAll();
                        $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tableLocations";
                        $this->load->view('template', $data);
                    }  
            }
        }
// --------- REALIZO LA MODIFICACION DE LAS LOCALIZACIONES ----------------------//

} //CIERRA LA CLASS LOCATIONS