<div class="container-fluid" id="updateMovie"> 
    <div class="row">
    <div class="col-md-4"></div> 
         <div class="col-md-4">
<?php
echo("
        <h3 class='text-center'>Formulario de modificacion de PELICULAS</h3>");
        echo form_open('Movies/updateMovie');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("<div class='form-group'>");
            echo("Título:</br>
            <input type='text' class='form-control' placeholder='Introduce el nombre de la pelicula' name='titulo' size='35' value='".$movieData['titulo']."' required/>
            ");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("Año:</br>
            <input type='number' class='form-control' placeholder='Introduce el año' name='anyo' value=".$movieData['anyo']." required/>
            ");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("País:<br>
            <input type='text' class='form-control' placeholder='Introduce el pais' name='pais' value=".$movieData['pais']." required/>
            ");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("<input type ='hidden' name='id' value=".$movieData['id']." />
            </br></br>");
        echo("</div>");
        echo("
            <input type='submit' class='btn btn-success' value='Modificar Pelicula'/>
            <input type='reset' class='btn btn-danger' value='Reponer los datos anteriores'/>
        </form>
        <br><br><br><br>
    ");
    
echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', 'class="btn btn-info"');