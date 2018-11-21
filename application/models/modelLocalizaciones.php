<?php 
class modelLocalizaciones extends CI_Model{

// ------- OBTENGO TODOS LOS DATOS DE LOCALIZACIONES, COMO DE LUGAR Y PELICULAS  -------------------- //
    public function getAll(){
        $query = $this->db->query("SELECT localizaciones.id, localizaciones.nombre, localizaciones.descripcion,
         localizaciones.fotografia,localizaciones.id_lugar, localizaciones.id_pelicula, peliculas.titulo AS nameMovie,
         lugares.nombre AS namePlace
        FROM localizaciones
            LEFT JOIN peliculas ON localizaciones.id_pelicula = peliculas.id
            LEFT JOIN lugares ON localizaciones.id_lugar = lugares.id;");
        $data = array();
        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $data[] = $row;
            }
        }
        return $data;
    }
// ------- OBTENGO TODAS LAS PELICULAS DE LA BASE DE DATOS -------------------- //

// ****************************************************************************//

// -------------------- OBTENGO LOS DATOS DE SOLO UN ID ----------------------//
    public function getOne($id){
        $query = $this->db->query("SELECT * FROM localizaciones WHERE id=$id;");
        
        return $query->result_array()[0];
    }
// -------------------- OBTENGO LOS DATOS DE SOLO UN ID ----------------------//

// ****************************************************************************//

// ----------------REALIZO LA INSERCION DE LOCALIZACIONES ----------------------- //
    public function insertLocation($nombre,$descripcion,$lugar,$pelicula,$imagen){
        $this->db->query("INSERT INTO localizaciones
            VALUES (null,'$nombre','$descripcion','$imagen','$lugar','$pelicula')");     

        return $this->db->affected_rows();
    }
// ----------------REALIZO LA INSERCION DE LOCALIZACIONES ----------------------- //

// ****************************************************************************//

// ------------- COMPRUEBO LA SUBIDA DE LA IMAGEN -----------------------------//
    public function checkUpload(){
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        //$config['file_name'] = $this->input->get_post("titulo");

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('imagen'))
            {
                    echo("<script>alert('fallo al subir la imagen');</script>");

                    $data["nombreVista"] = "insertLocation";
                    $this->load->view('template',$data);
                    return false;
                }else{
                    $img_name = $this->upload->data('file_name');
                    return  $img_name;
                }
    }
// ------------- COMPRUEBO LA SUBIDA DE LA IMAGEN -----------------------------//

// ****************************************************************************//

// ------------- REALIZO LA ELIMINACION DE LAS LOCALIZACIONES ----------------------//
    public function deleteLocation($id){
        $query = $this->db->query("SELECT fotografia FROM localizaciones WHERE id='$id' ");
        $fileToDelete = implode($query->result_array()[0]);
        unlink($fileToDelete);

        $this->db->query("DELETE FROM localizaciones WHERE id='$id';");

        return $this->db->affected_rows();
    }
// ------------- REALIZO LA ELIMINACION DE LAS LOCALIZACIONES ----------------------//

// ****************************************************************************//

// --------- REALIZO LA MODIFICACION DE LAS PELICULAS ----------------------//
    public function updateLocation($id,$nombre,$descripcion,$fotografia,$lugar,$pelicula){
        $this->db->query("UPDATE localizaciones
         SET        
            nombre = '$nombre',
            descripcion = '$descripcion',
            fotografia = '$fotografia',
            id_lugar = '$lugar',
            id_pelicula = '$pelicula'
            WHERE id = $id
        ;");     

        return $this->db->affected_rows();
    }
// --------- REALIZO LA MODIFICACION DE LAS PELICULAS ----------------------//

}// CIERRO LA CLASS modelLocalizaciones