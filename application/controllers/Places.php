<?php 
    include_once('Security.php');
    class Places extends Security{

        public function __construct(){
            parent::__construct();
            $this->load->model('modelPeliculas');
            $this->load->model('modelLugares');
            $this->load->model('modelLocalizaciones');
            
        }


// ------- CARGO LA VISTA DEL FORMULARIO DE INSERCION DE LUGARES ------------ //
        public function showInsertar(){
            if($this->security_check()){
                $data["nombreVista"] = "insertPlace";
                $this->load->view('template',$data);
            }
        }
// ------- CARGO LA VISTA DEL FORMULARIO DE INSERCION DE LUGARES ------------ //

// ****************************************************************************//

// ------------- REALIZO LA INSERCION DE LUGARES --------------------------- //
        public function insertPlace(){
            if($this->security_check()){
                $nombre = $this->input->get_post("nombre");
                $descripcion = $this->input->get_post("descripcion");
                $longitud = $this->input->get_post("longitud");
                $latitud = $this->input->get_post("latitud");
                
                $resultado = $this->modelLugares->insertPlace($nombre,$descripcion,$longitud,$latitud);

                if ($resultado == -1){
                    echo("<h3>Error al insertar el lugar</h3>");
                    $data["nombreVista"] = "administracion";
                    $data["table_to_show"] = "tablePlaces";
                    $this->load->view('template',$data);
                }else{
                    echo("<h3>Lugar insertado con éxito</h3>");
                    $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                    $data["listaLugares"] = $this->modelLugares->getAll();
                    $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                    $data["nombreVista"] = "administracion";
                    $data["table_to_show"] = "tablePlaces";
                    $this->load->view('template', $data);
                }
            }
        }
// ------------- REALIZO LA INSERCION DE LUGARES --------------------------- //

// ****************************************************************************//

// ------------- REALIZO LA ELIMINACION DE LOS LUGARES ----------------------//
        public function deletePlace($id){
            if($this->security_check()){
                $this->load->model('modelLugares');
                $resultado = $this->modelLugares->deletePlace($id);
                //var_dump($resultado);
                $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                $data["listaLugares"] = $this->modelLugares->getAll();
                $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                $data["nombreVista"] = "administracion";
                $data["table_to_show"] = "tablePlaces";
                if ($resultado == 0){
                    echo("<h3>Error al eliminar el lugar</h3>");
                    $this->load->view('template', $data);
                }else{
                    echo("<h3>Lugar eliminado con éxito</h3>");
                    $this->load->view('template', $data);
                }
            }
        }
// ------------- REALIZO LA ELIMINACION DE LOS LUGARES ----------------------//

// ****************************************************************************//

// --------- CARGO LA VISTA DEL FORMULARIO DE MODIFICACION DE LUGARES ----//
        public function showUpdate($id){
            if($this->security_check()){
                $data["nombreVista"] = "updatePlace";
                $data["dataPlace"]  = $this->modelLugares->getOne($id);
                $this->load->view('template', $data);
            }
        }
// --------- CARGO LA VISTA DEL FORMULARIO DE MODIFICACION DE LUGARES ----//

// ****************************************************************************//

// ------------- REALIZO LA MODIFICACION DE LOS LUGARES ----------------------//
        public function updatePlace(){
            if($this->security_check()){
                $id = $this->input->get_post("id");
                $nombre = $this->input->get_post("nombre");
                $descripcion = $this->input->get_post("descripcion");
                $longitud = $this->input->get_post("longitud");
                $latitud = $this->input->get_post("latitud");

                $resultado = $this->modelLugares->updatePlace($id,$nombre,$descripcion,$longitud,$latitud);
                
                    if ($resultado == -1){
                        echo("<h3>Error al modificar el lugar</h3>");
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tablePlaces";
                        $this->load->view('template',$data);
                    }else{
                        echo("<h3>Lugar modificado con éxito</h3>");                       
                        $data["listaPeliculas"] = $this->modelPeliculas->getAll();
                        $data["listaLugares"] = $this->modelLugares->getAll();
                        $data["listaLocalizaciones"] = $this->modelLocalizaciones->getAll();
                        $data["nombreVista"] = "administracion";
                        $data["table_to_show"] = "tablePlaces";
                        $this->load->view('template', $data);
                    }  
            }
        }
// ---------------- REALIZO LA MODIFICACION DE LOS LUGARES ----------------------//

}// CIERRO LA CLASS PLACES
?>