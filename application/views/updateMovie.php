<?php
echo("
        <h3>Formulario de modificacion de PELICULAS</h3>");
        echo form_open('Movies/updateMovie');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("
            Título:</br>
            <input type='text' placeholder='Introduce el nombre de la pelicula' name='titulo' size='35' value='".$movieData['titulo']."' required/>
            </br>
            Año:</br>
            <input type='number' placeholder='Introduce el año' name='anyo' value=".$movieData['anyo']." required/>
            <br>
            País:<br>
            <input type='text' placeholder='Introduce el pais' name='pais' value=".$movieData['pais']." required/>
            <br>
            <input type ='hidden' name='id' value=".$movieData['id']." />
            </br></br>
            <input type='submit' value='Modificar Pelicula'/>
            <input type='reset' value='Reponer los datos anteriores'/>
        </form>
        <br><br><br><br>
    ");
    
echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', '');