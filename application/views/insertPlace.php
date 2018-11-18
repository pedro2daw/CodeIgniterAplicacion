<?php
echo("
        <h3>Formulario Insercion de lugares</h3>");
        echo form_open('Places/insertPlace');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("
            Nombre:</br>
            <input type='text' placeholder='Introduce el nombre del lugar' name='nombre' size='35' required/>
            </br>
            Descripcion:</br>
            <input type='text' placeholder='Introduce la descripcion' name='descripcion' required/>
            <br>
            Longitud:<br>
            <input type='number' placeholder='Introduce la longitud' name='longitud' required/>
            <br>
            Latitud:<br>
            <input type='number' placeholder='Introduce la latitud' name='latitud' size='35' required/>
            </br></br></br>
            <input type='submit' value='Insertar Lugar'/>
            <input type='reset' value='Borrar datos'/>
        </form>
        <br><br><br><br>
    ");
    
echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', '');