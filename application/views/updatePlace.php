<div class="container-fluid"> 
    <div class="row">
    <div class="col-md-4"></div> 
         <div class="col-md-4">
<?php
echo("
        <h4 class='text-center'>Formulario de modificación de lugares</h4>");
        echo form_open('Places/updatePlace');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("<div class='form-group'>");
            echo("Nombre:</br>
            <input type='text' class='form-control' placeholder='Introduce el nombre del lugar' name='nombre' size='35' value='".$dataPlace['nombre']."' required/>
            ");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("Descripcion:</br>
            <input type='text' class='form-control' placeholder='Introduce la descripcion' name='descripcion' value=".$dataPlace['descripcion']." required/>
            ");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("Longitud:<br>
            <input type='number' class='form-control' placeholder='Introduce la longitud' name='longitud' value=".$dataPlace['longitud']." step='0.01' required/>
            ");
        echo("</div>");

        echo ("<div class='form-group'>");
            echo("Latitud:<br>
            <input type='number' class='form-control' placeholder='Introduce la latitud' name='latitud' value=".$dataPlace['latitud']." step='0.01' required/>
            <input type ='hidden' name='id' value=".$dataPlace['id']." />
            ");
        echo("</div>");
        echo("
            </br></br></br>
            <input type='submit' class='btn btn-success' value='Modificar Lugar'/>
            <input type='reset' class='btn btn-danger' value='Reponer los datos anteriores'/>
        </form>
        <br><br><br>
    ");
    
echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', 'class="btn btn-info"');