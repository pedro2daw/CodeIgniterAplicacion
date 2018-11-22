<div class="container-fluid"> 
    <div class="row">
    <div class="col-md-4"></div> 
         <div class="col-md-4">
<?php
echo("
        <h4 class='text-center'>Formulario de insercion de lugares</h4>");
        echo form_open('Places/insertPlace');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("<div class='form-group'>");
            echo("Nombre:</br>
            <input type='text' class='form-control' placeholder='Introduce el nombre del lugar' name='nombre' size='35' required/>
            ");
        echo ("</div>");

        echo ("<div class='form-group'>");
            echo("Descripcion:</br>
            <input type='text' class='form-control' placeholder='Introduce la descripcion' name='descripcion' required/>
            ");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("Longitud:<br>
            <input type='number' class='form-control' placeholder='Introduce la longitud' name='longitud' required/>
            ");
        echo ("</div>");

        echo ("<div class='form-group'>");
            echo("Latitud:<br>
            <input type='number' class='form-control' placeholder='Introduce la latitud' name='latitud' size='35' required/>
            </div></br></br></br>");
            echo("<input type='submit' class='btn btn-success' value='Insertar Lugar'/>
            <input type='reset' class='btn btn-danger' value='Borrar datos'/>
        </form>
        <br><br><br>
    ");
    
echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', 'class="btn btn-info"');