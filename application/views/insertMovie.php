<?php
echo("
        <h3>Formulario de insercion de peliculas</h3>");
        echo form_open_multipart('Movies/insertMovie');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("
            Título:</br>
            <input type='text' placeholder='Introduce el nombre de la pelicula' name='titulo' size='35' required/>
            </br>
            Año:</br>
            <input type='number' placeholder='Introduce el año' name='anyo' required/>
            <br>
            País:<br>
            <input type='text' placeholder='Introduce el pais' name='pais' required/>
            <br>
            Cartel:<br>
            <input type='file' placeholder='Introduce la ruta de la imagen' name='cartel' size='35' value='Seleccionar archivo' required/>
            </br></br></br>
            <input type='submit' value='Insertar Pelicula'/>
            <input type='reset' value='Borrar datos'/>
        </form>
        <br><br><br><br>
    ");
    
echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', '');
