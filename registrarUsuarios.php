<?php 
       
       include("BaseDatos.php");

       if(isset($_POST["botonEnvio"])){
           //recibir datos
         $instrumento=$_POST["instrumento"];
         $marca=$_POST["marca"];
         $precio=$_POST["precio"];
         $descripcion=$_POST["descripcion"];
         $foto=$_POST["foto"];


         //2. crear un objeto de la clase BaseDatos
         //2. sacar una copia de la clase BaseDatos
         
         $transaccion= new BaseDatos();
         
         //3.crear la consulta sql para agregar datos
         $consultaSQL="INSERT INTO usuarios(instrumento,marca,precio,descripcion,foto) VALUES ('$instrumento','$marca','$precio','$descripcion','$foto')";
         
         
         
         //4. llamar al metodo agregardatos
          $transaccion->agregarDatos($consultaSQL);
       }




?>