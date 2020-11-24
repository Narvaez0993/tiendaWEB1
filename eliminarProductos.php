 <?php
 
     include("BaseDatos.php");
    
    //recibir el id del registro para eliminar
    $id=$_GET["id"];
    

    //1. utilizar la base datos (sacarle copia a la clase)
    $transaccion= new BaseDatos();
    
    //2. crear la consulta SQL para eliminar registro
    $consultaSQL="DELETE FROM usuarios WHERE idUsuario='$id'";

    //3. llamar y utilizar el metodo eliminarDatos
    $transaccion->eliminarDatos($consultaSQL);
 
 
 ?>