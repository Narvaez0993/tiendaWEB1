<?php 

    include("baseDatos.php");

    if(isset($_POST["botonEditar"])){

      //1. recibir datos que vamos a actualizar 
      $instrumento=$_POST["instrumentoEditar"];
      $descripcion=$_POST["descripcionEditar"];
      $foto=$_POST["fotoEditar"];
      $precio=$_POST["precioEditar"];
      $marca=$_POST["marcaEditar"];
      
      //2. recibimos el id del registro actualizable
      $id=$_GET["id"];

      //3. crear objeto de la clase
      $transaccion= new BaseDatos();

       //4. crear una consulta para editar datos SQL
       $consultaSQL="UPDATE usuarios SET instrumento='$instrumento',descripcion='$descripcion',foto='$foto', precio='$precio',marca='$marca' WHERE idUsuario='$id'";


       //5. acceder al metodo editarReagistros
       $transaccion->editarDatos($consultaSQL);

       //6. redireccion
       header("location:listaProductos.php");
    }





?>