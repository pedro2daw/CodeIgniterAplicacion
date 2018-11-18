<div class="container-fluid" id="adminPanel">   
<?php
print_r($this->session->userdata);
print_r(time());
    //-----CREO LOS BOTONES PARA OCULTAR-MOSTRAR LAS TABLAS DE ADMINISTRACION DE LA BD--------//
echo("<div class='row' id='flex'>");
echo ("<div class='col'>");
    echo("<input type='button' class='btn btn-info' value='Peliculas' onclick='showMovies();'/>");//' onclick='showTable(\"tableUser\");'/>");
    echo("<input type='button' class='btn btn-danger tableButtons' value='Lugares' onclick='showPlaces();'/>"); //onclick='showTable(\"tableRol\");'/>");
    echo("<input type='button' class='btn btn-warning tableButtons' value='Localizaciones' onclick='showLocations();'/>");// onclick='showTable(\"tablePermis\");'/>");
    echo ("<a href='".site_url('Users/cerrarSesion')."' id='logout' class='btn btn-danger'>Cerrar sesion</a>");
echo ("</div>");
echo ("</div>");
    //-----CREO LOS BOTONES PARA OCULTAR-MOSTRAR LAS TABLAS DE ADMINISTRACION DE LA BD--------//
    
    echo("<br><br>");
    //*************************************************************************************//


    // ---- CREO EL DIV DONDE IRÁ LA TABLA DE PELICULAS -----------------------------------//
    echo("<div class='table-responsive' id='tableMovies'>");
        
        echo("<table class='table table-striped table-dark text-center'> <thead class='bg-warning font-weight-bold text-dark'><td>ID</td><td>Titulo</td><td>Año</td><td>Pais</td><td>Cartel</td><td></td><td></td></thead>");    
            for ($i = 0; $i < count($listaPeliculas);$i++){
                $each_movie = $listaPeliculas[$i];
                    echo ("<tr><td>".$each_movie["id"]."</td>");
                    echo ("<td>".$each_movie["titulo"]."</td>");
                    echo ("<td>".$each_movie["anyo"]."</td>");
                    echo ("<td>".$each_movie["pais"]."</td>");
                    echo ("<td><img src='".base_url().$each_movie["cartel"]."' alt='Cartel bueno feo malo' /></td>");
                    echo("<td>");
                            echo anchor("Movies/showUpdate/".$each_movie['id'],"Modificar","class='btn btn-info'");
                            
                    echo("</td>");  
                    echo("<td>");
                            echo anchor("Movies/deleteMovie/".$each_movie['id'],"Eliminar","class='btn btn-danger'");
                    echo("</td></tr>");
            }
        echo("</table>");   
        echo("<br>");
        echo anchor('Movies/showInsertar','Insertar Película', 'class="btn btn-success"');// crea el enlace completo <a href>
        
    echo("</div>");
    // ---- CREO EL DIV DONDE IRÁ LA TABLA DE PELICULAS -----------------------------------//
    
    //*************************************************************************************//

    // ---- CREO EL DIV DONDE IRÁ LA TABLA DE LUGARES -----------------------------------//
    echo("<div class='table-responsive' id='tablePlaces'>");

        echo("<table class='table table-striped table-dark text-center'> <thead class='bg-warning font-weight-bold text-dark'><td>ID</td><td>Nombre</td><td>Descripcion</td><td>Longitud</td><td>Latitud</td><td></td><td></td></thead>");
            for ($i = 0; $i < count($listaLugares);$i++){
                $each_place = $listaLugares[$i];
                    echo("<tr><td>".$each_place["id"]."</td>");
                    echo("<td>".$each_place["nombre"]."</td>");
                    echo("<td>".$each_place["descripcion"]."</td>");
                    echo("<td>".$each_place["longitud"]."</td>");
                    echo("<td>".$each_place["latitud"]."</td>");
                    echo("<td>");
                            echo anchor("Places/showUpdate/".$each_place['id'],"Modificar","class='btn btn-info'");
                    echo("</td>");  
                    echo("<td>");
                            echo anchor("Places/deletePlace/".$each_place['id'],"Eliminar","class='btn btn-danger'");
                    echo("</td></tr>");
            }
        echo("</table>");
        echo("<br>");
        echo anchor('Places/showInsertar','Insertar Lugar', 'class="btn btn-success"');// crea el enlace completo <a href>
        
    echo("</div>"); /*CERRAMOS EL DIV id="tablePlaces" */
    // ---- CREO EL DIV DONDE IRÁ LA TABLA DE LUGARES -----------------------------------//

    //*************************************************************************************//

    // ---- CREO EL DIV DONDE IRÁ LA TABLA DE LOCALIZACIONES -----------------------------------//
    echo("<div class='table-responsive' id='tableLocations'>");
        echo("<table class='table table-striped table-dark text-center'> <thead class='bg-warning font-weight-bold text-dark'><td>ID</td><td>Nombre</td><td>Descripcion</td><td>Fotografia</td><td>Lugar</td><td>Pelicula</td><td></td><td></td></thead>");
            for ($i = 0; $i < count($listaLocalizaciones);$i++){
                $each_location = $listaLocalizaciones[$i];
                    echo("<tr><td>".$each_location["id"]."</td>");
                    echo("<td>".$each_location["nombre"]."</td>");
                    echo("<td>".$each_location["descripcion"]."</td>");
                    echo ("<td><img src='".base_url().$each_location["fotografia"]."'/></td>");
                    echo("<td>".$each_location["namePlace"]."</td>");
                    echo("<td>".$each_location["nameMovie"]."</td>");
                    echo("<td>");
                            echo anchor("Locations/showUpdate/".$each_location['id'],"Modificar","class='btn btn-info'");
                           
                    echo("</td>");  
                    echo("<td>");
                            echo anchor("Locations/deleteLocation/".$each_location['id'],"Eliminar","class='btn btn-danger'"); 
                    echo("</td></tr>");
                    
            }
        echo("</table>");
        echo("<br>");
        
        echo anchor('Locations/showInsertar','Insertar Localizacion', 'class="btn btn-success"');// crea el enlace completo <a href>
        
    echo("</div>"); /*CERRAMOS EL DIV id="tableLocations" */
    // ---- CREO EL DIV DONDE IRÁ LA TABLA DE LUGARES -----------------------------------//










    

?>