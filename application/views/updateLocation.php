<div class="container-fluid" id="updateLocation"> 
    <div class="row">
    <div class="col-md-4"></div> 
         <div class="col-md-4">
<?php
echo("
        <h4 class='text-center'>Formulario de modificacion de localizaciones</h4>");
        echo form_open_multipart('Locations/updateLocation');
        echo ("<div class='form-group'>");
            echo "Nombre"."<br>".
                form_input('nombre', $locationData["nombre"], 'required class="form-control" placeholder="Introduce el nombre"');
        echo ("</div>");
        
        echo ("<div class='form-group'>");
        echo "Descripcion". "<br>".
            form_input('descripcion', $locationData["descripcion"], 'required class="form-control" placeholder="Introduce la descripcion"');
        echo("</div>");
        
        echo ("<div class='form-group'>");
            echo "Lugar"."<br>".
                form_dropdown('lugar', $namePlace,$locationData['id_lugar'], 'class="form-control form-control-md"');
        echo("</div>");

        echo ("<div class='form-group'>");
            echo "Pelicula"."<br>".
                form_dropdown('pelicula', $nameMovie,$locationData['id_pelicula'],'class="form-control form-control-md"');
        echo("</div>");
        echo form_hidden('id', $locationData['id']);

        echo "<br>".
        form_submit('submit', 'Modificar','class="btn btn-success"');
        echo("<input type='reset' class='btn btn-danger' value='Reponer los datos anteriores'/>");
        echo form_close();
        echo "<br><br><br>";

        echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', 'class="btn btn-info"');

?>