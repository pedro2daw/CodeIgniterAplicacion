<script>
    http_request = new XMLHttpRequest();

    function check_user(){
        var username;
        username = encodeURIComponent(document.getElementById("user").value);

         http_request.onreadystatechange = show_result;
         http_request.open('POST', '<?php echo site_url('/Users/check_user/')?>'+username, true);
         http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         http_request.send(null);
    }

    function show_result(){
        if (http_request.readyState == 4){
            if(http_request.status == 200){
                if (http_request.responseText == 0){
                    document.getElementById("ajax").innerHTML = "El usuario no existe";
                }else{
                    document.getElementById("ajax").innerHTML = "Usuario correcto";
                }
            }
        }
    }
</script>





<?php 
echo('    
<div class="container-fluid" id="login"> 
    <div class="row">
    <div class="col-md-4"></div> 
         <div class="col-md-4">
    ');
    echo("
        <h4 class='text-center'>Formulario de Login</h4>");
        if(isset($msg)) echo $msg;
        echo form_open('Users/checkLogin');  // ESTA LINEA SUSTITUYE A LA PRIMERA NORMAL DE UN FORM  
        echo ("<div class='form-group'>");
        echo ("
            Nombre</br>
            <input type='text' class='form-control' placeholder='Introduce tu nombre' name='nombre' onblur='check_user();' id='user' required/>
            <p id='ajax'></p>
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
   

