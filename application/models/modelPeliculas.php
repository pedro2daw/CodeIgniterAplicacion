<?php 
class modelPeliculas extends CI_Model{

// ------- OBTENGO TODAS LAS PELICULAS DE LA BASE DE DATOS -------------------- //
    public function getAll(){
        $query = $this->db->query("SELECT * FROM peliculas ");
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
        $query = $this->db->query("SELECT * FROM peliculas WHERE id='$id' ");
        
        return $query->result_array()[0];
    }
// -------------------- OBTENGO LOS DATOS DE SOLO UN ID ----------------------//

// ****************************************************************************//

// ----------------REALIZO LA INSERCION DE PELICULAS ----------------------- //
    public function insertMovie($titulo,$anyo,$pais,$cartel){
        $this->db->query("INSERT INTO peliculas
            VALUES (null,'$titulo',$anyo,'$pais','$cartel')");     

        return $this->db->affected_rows();
    }
// ----------------REALIZO LA INSERCION DE PELICULAS ----------------------- //

// ****************************************************************************//

// ------------- REALIZO LA ELIMINACION DE LAS PELICULAS ----------------------//
    public function deleteMovie($id){
        $query = $this->db->query("SELECT cartel FROM peliculas WHERE id='$id' ");
        $fileToDelete = implode($query->result_array()[0]);
        unlink($fileToDelete);

        $this->db->query("DELETE FROM peliculas WHERE id='$id';");

        $query_two = $this->db->query("SELECT fotografia FROM localizaciones WHERE id_pelicula='$id'");
        $fileToDelete_two = implode($query_two->result_array()[0]);
        unlink($fileToDelete_two);
        $this->db->query("DELETE FROM localizaciones WHERE id_pelicula='$id'");

        return $this->db->affected_rows();
    }
// ------------- REALIZO LA ELIMINACION DE LAS PELICULAS ----------------------//

// ****************************************************************************//

// ------------- COMPRUEBO LA SUBIDA DE LA IMAGEN -----------------------------//
    public function checkUpload($titulo){
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = $titulo;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('cartel'))
            {
                    echo("<script>alert('fallo al subir la imagen');");

                    $data["nombreVista"] = "insertMovie";
                    $this->load->view('template',$data);
                    return false;
                }else{
                    $img_name = $this->upload->data('file_name');
                    return  $img_name;
                }
    }
// ------------- COMPRUEBO LA SUBIDA DE LA IMAGEN -----------------------------//

// ****************************************************************************//

// --------- REALIZO LA MODIFICACION DE LAS PELICULAS ----------------------//
    public function updateMovie($id,$titulo,$anyo,$pais){
        $this->db->query("UPDATE peliculas SET
        
            titulo = '$titulo',
            anyo = '$anyo',
            pais = '$pais',
            WHERE id = $id
        ;");     

        return $this->db->affected_rows();
}
// --------- REALIZO LA MODIFICACION DE LAS PELICULAS ----------------------//

// ****************************************************************************//

// --------- OBTENGO EL NOMBRE E ID DE LA PELICULA PARA INSERT LOCALIZACIONES -------//
    public function getName(){
        $query = $this->db->query("SELECT id AS id_movie, titulo FROM peliculas");
        
        $data = array();
        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $data[] = $row;
            }
        }
        return array_column($data,'titulo','id_movie'); // obtenemos un array con los datos de la consulta, una columna que es el titulo y el id funciona como indice
    }
// --------- OBTENGO EL NOMBRE E ID DE LA PELICULA PARA INSERT LOCALIZACIONES -------//



} // cierra class modelPeliculas
?>