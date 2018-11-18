<?php 
    print_r($this->session->userdata);
    print_r(time());
 
    print_r($this->session->userdata);
    print_r(time());
?>

    
<div class="container-fluid" id="login"> 
    <div class="row">
    <div class="col-md-4"></div> 
         <div class="col-md-4">
            <?php
    echo("
        <h4 class='text-center'>Formulario de Login</h4>");
        if(isset($msg)) echo $msg;
        echo form_open('Users/checkLogin');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("<div class='form-group'>");
        echo ("
            Nombre</br>
            <input type='text' class='form-control' placeholder='Introduce tu nombre' name='nombre' required/>
            <!--</br>-->");
        echo(" </div>");

        echo ("<div class='form-group'>");
        echo("Contraseña</br>
            <input type='password' class='form-control' placeholder='Introduce tu contraseña' name='password' required/>
            <!--</br></br></br>-->");
            echo("</div>");
        echo("
            <input type='submit' class='btn btn-success' value='Acceder'/>
            <input type='reset' class='btn btn-danger' value='Borrar datos'/>
        </form>
    
    <br><br><br>
    
    ");
?>
   

