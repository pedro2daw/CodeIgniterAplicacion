<?php
echo("
        <h3>Formulario Insercion de lugares</h3>");
        echo form_open('Places/updatePlace');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("
            Nombre:</br>
            <input type='text' placeholder='Introduce el nombre del lugar' name='nombre' size='35' value='".$dataPlace['nombre']."' required/>
            </br>
            Descripcion:</br>
            <input type='text' placeholder='Introduce la descripcion' name='descripcion' value=".$dataPlace['descripcion']." required/>
            <br>
            Longitud:<br>
            <input type='number' placeholder='Introduce la longitud' name='longitud' value=".$dataPlace['longitud']." step='0.01' required/>
            <br>
            Latitud:<br>
            <input type='number' placeholder='Introduce la latitud' name='latitud' value=".$dataPlace['latitud']." step='0.01' required/>
            <input type ='hidden' name='id' value=".$dataPlace['id']." />
            </br></br></br>
            <input type='submit' value='Modificar Lugar'/>
            <input type='reset' value='Borrar datos'/>
        </form>
        <br><br><br><br>
    ");
    
echo anchor('Users/panelAdministracion', 'Volver al panel de administracion', '');