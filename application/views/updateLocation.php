<?php
echo("
        <h3>Formulario de modificacion de localizaciones</h3>");
        echo form_open_multipart('Locations/updateLocation');
            echo "Nombre"."<br>".
                form_input('nombre', $locationData["nombre"], 'required'). "<br>";
            echo "Descripcion". "<br>".
                form_input('descripcion', $locationData["descripcion"], 'required'). "<br>";
            echo "Fotografía"."<br>".
                form_input('ruta',$locationData["fotografia"],'required'). "<br>";
            echo "Lugar"."<br>".
                form_dropdown('lugar', $namePlace,$locationData['id_lugar']). "<br>";
            echo "Pelicula"."<br>".
                form_dropdown('pelicula', $nameMovie,$locationData['id_pelicula']). "<br>";
            echo form_hidden('id', $locationData['id']);
            echo "<br>".
                form_submit('submit', 'Modificar');
        echo form_close();
        echo "<br><br><br><br>";

        echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', '');
?>