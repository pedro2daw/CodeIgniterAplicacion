<?php 
class modelLugares extends CI_Model{
// ------- OBTENGO TODAS LOS LUGARES DE LA BASE DE DATOS -------------------- //
    public function getAll(){
        $query = $this->db->query("SELECT * FROM lugares ");
        
        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $data[] = $row;
            }
        }
        return $data;
    }
// ------- OBTENGO TODAS LOS LUGARES DE LA BASE DE DATOS -------------------- //

// ****************************************************************************//

// -------------------- OBTENGO LOS DATOS DE SOLO UN ID ----------------------//
    public function getOne($id){
        $query = $this->db->query("SELECT * FROM lugares WHERE id='$id' ");
            
        return $query->result_array()[0];
}
// -------------------- OBTENGO LOS DATOS DE SOLO UN ID ----------------------//

// ****************************************************************************//

// ----------------REALIZO LA INSERCION DE LUGARES ----------------------- //
    public function insertPlace($nombre,$descripcion,$longitud,$latitud){
        $this->db->query("INSERT INTO lugares
            VALUES (null,'$nombre','$descripcion',$longitud,$latitud)");     

        return $this->db->affected_rows();
    }
// ----------------REALIZO LA INSERCION DE LUGARES ----------------------- //

// ****************************************************************************//

// ------------- REALIZO LA ELIMINACION DE LOS LUGARES ----------------------//
    public function deletePlace($id){
        $this->db->query("DELETE FROM lugares WHERE id='$id';");

        /*$query = $this->db->query("SELECT fotografia FROM localizaciones WHERE id_lugar='$id'");
        $fileToDelete = implode($query->result_array()[0]);
        unlink($fileToDelete);
        $this->db->query("DELETE FROM localizaciones WHERE id_pelicula='$id'");
*/
        return $this->db->affected_rows();
    }
// ------------- REALIZO LA ELIMINACION DE LOS LUGARES ----------------------//

// ****************************************************************************//

// --------- REALIZO LA MODIFICACION DE LAS PELICULAS ----------------------//
    public function updatePlace($id,$nombre,$descripcion,$longitud,$latitud){
        $this->db->query("UPDATE lugares SET
        
            nombre = '$nombre',
            descripcion = '$descripcion',
            longitud = '$longitud',
            latitud = '$latitud'
            WHERE id = $id
        ;");     

        return $this->db->affected_rows();
    }
// --------- REALIZO LA MODIFICACION DE LAS PELICULAS ----------------------//

// ****************************************************************************//

// --------- OBTENGO EL NOMBRE E ID DEL LUGAR PARA INSERT LOCALIZACIONES -------//
    public function getName(){
        $query = $this->db->query("SELECT id AS id_place, nombre FROM lugares");
        
        $data = array();
        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $data[] = $row;
            }
        }
        return array_column($data,'nombre','id_place'); // obtenemos un array con los datos de la consulta, una columna que es el titulo y el id funciona como indice
    }
// --------- OBTENGO EL NOMBRE E ID DEL LUGAR PARA INSERT LOCALIZACIONES -------//







} // cierra class modelLugares
?>