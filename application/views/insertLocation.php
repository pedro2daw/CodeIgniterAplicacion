<div class="container-fluid" id="insertLocation"> 
    <div class="row">
    <div class="col-md-4"></div> 
         <div class="col-md-4">
<?php
echo("
        <h4 class='text-center'>Formulario de insercion de localizaciones</h4>");
        echo form_open_multipart('Locations/insertLocation');
        echo ("<div class='form-group'>");
            echo "Nombre"."<br>".
                form_input('nombre', '', 'required class="form-control" placeholder="Introduce tu nombre"');
        echo ("</div>");

        echo ("<div class='form-group'>");
            echo "Descripcion". "<br>".
                form_input('descripcion', '', 'required class="form-control" placeholder="Introduce la descripcion"');
        echo("</div>");

        echo ("<div class='form-group'>");
            echo "Fotografía"."<br>".
                form_upload('imagen','imagen','required class="form-control-file"');
        echo("</div>");

        echo ("<div class='form-group'>");
            echo "Lugar"."<br>".
                form_dropdown('lugar', $namePlace, 'class="form-control form-control-lg"');
        echo("</div>");

        echo ("<div class='form-group'>");
            echo "Pelicula"."<br>".
                form_dropdown('pelicula', $nameMovie,'class="form-control form-control-lg"');
        echo("</div>");
            echo "<br>".
                form_submit('submit', 'Insertar','class="btn btn-success"');
        echo form_close();
        echo "<br><br><br><br>";

        echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', 'class="btn btn-info"');
?>