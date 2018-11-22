<div class="container-fluid"> 
    <div class="row">
    <div class="col-md-4"></div> 
         <div class="col-md-4">

<?php
echo("
        <h4 class='text-center'>Formulario de insercion de peliculas</h4>");
        echo form_open_multipart('Movies/insertMovie');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("<div class='form-group'>");
            echo ("Título:</br>
            <input type='text' class='form-control' placeholder='Introduce el nombre de la pelicula' name='titulo' size='35' required/>
            <!--</br>-->");
        echo("</div>");

        echo ("<div class='form-group'>");
                echo("Año:</br>
            <input type='number' class='form-control' placeholder='Introduce el año' name='anyo' required/>
            <!--<br>-->");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("País:<br>
            <input type='text' class='form-control' placeholder='Introduce el pais' name='pais' required/>
            <!--<br>-->");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("Cartel:<br>
            <input type='file' class='form-control' placeholder='Introduce la ruta de la imagen' name='cartel' size='35' value='Seleccionar archivo' required/>
            ");
        echo("</div> </br></br>");
        echo("
            <input type='submit' class='btn btn-success' value='Insertar Pelicula'/>
            <input type='reset' class='btn btn-danger' value='Borrar datos'/>
        </form>
        <br><br><br><br>
    ");
    
echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', 'class="btn btn-info"');
