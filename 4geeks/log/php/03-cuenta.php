<form action="" method="post" class="col-md-8 col-md-offset-2 formulario">
   
    <h2>Cambiar Contraseña</h2>

    <label for="actualPass">Password Actual:</label>
    <input type="password" name="actualPass" id="actualPass" value=""  class="form-control">

    <label for="new_pass">Nuevo Password:</label>
    <input type="password" name="new_pass" id="new_pass" value=""  class="form-control">

    <label for="new_pass_confirm">Confirmar Password:</label>
    <input type="password" name="new_pass_confirm" id="new_pass_confirm" value=""  class="form-control">

  
    <br>
    <input type="submit" id="btn" name="btn" value="Guardar" class="btn btn-success">
</form>

<div class="clearfix"></div>


<?php 
 $btn = @$_POST['btn'];
    $oldPass = @$_POST['actualPass'];
    $newPass = @$_POST['new_pass'];
    $newPassConfirm = @$_POST['new_pass_confirm'];
if (isset($btn)) {

    if ($newPass == $newPassConfirm) {
        //echo ('Password igual');
        if (strlen($newPass) > 5 ) {
           // echo 'correcto';
            $consulta = "SELECT * from users where email = '$usuario' && password = '$oldPass' ";
            $respuesta = mysqli_query($conexion,$consulta);
        
            if ($respuesta) {
            //echo "a modificar " .$UserEmail;  
                $registros = mysqli_affected_rows($conexion);
                if ($registros > 0) {
                    //echo "a modificar " .$UserEmail .' por ' .$NewUserEmail;
                    $consulta = "UPDATE users set password='$newPass' where email = '$usuario' limit 1 ";
                    $respuesta = mysqli_query($conexion,$consulta);
                    if ($respuesta) {
                        echo "<p class='bg-success alert alert alert-dismissible txt-alert'>La contraseña ha sido actualizada<p>";
                    }else{
                        echo '<script language="javascript">alert("Error en la actualización de datos");</script>';
                    }
                }else{
                    echo ("<p class='bg-danger alert alert alert-dismissible txt-alert'>Verifique los datos ingresados.<p>");
                    echo '<script language="javascript">alert("Datos incorrectos");</script>'; 
                }
            }else{
                echo "error de conexion";
            }     
          
        }else{
            echo ("<p class='bg-danger alert alert alert-dismissible txt-alert'>La contraseña debe ser de 5 dígitos como mínimo<p>");
        }
    }else{
        echo ("<p class='bg-danger alert alert alert-dismissible txt-alert'>Las contaseñas no coinciden.<p>");
    }
}
?>