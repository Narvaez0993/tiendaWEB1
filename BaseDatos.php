<?php 

class BaseDatos{

    //variables = atributos
    public $usuarioBD="root";
    public $passwordBD="";

    //funcion especial para sacar copia de la clase(el constructor)
    public function __construct(){

    }
    //funciones = metodos
    public function conectarBD(){
    
        try{
           $infoBD="mysql:host=localhost;dbname=instrumentos";
           $conexionBD= new PDO($infoBD,$this->usuarioBD,$this->passwordBD);
           return($conexionBD);

        }catch(PDOException $error){

            echo($error->getMessage());
          
        }
    }

    public function agregarDatos($consultaSQL){
       
        //1. conectarme a la BD
        $conexionBD=$this->conectarBD();

        //2. preparar la consulta
        $consultaAgregarDatos= $conexionBD->prepare($consultaSQL);

        //3. ejecutar la consulta
        $resultado= $consultaAgregarDatos->execute();

        //4. verifique el resultado
        if($resultado){
            echo("Registro agregado con exito");
        }else{
            echo("Error agregado al registro");
        }

    

    }
    
    public function buscarDatos($consultaSQL){
          
        //1. conectarme a la BD
        $conexionBD=$this->conectarBD();

        //2. preparar la consulta
        $consultaBuscarDatos= $conexionBD->prepare($consultaSQL);

        //3. indicar cual es el metodo para traer los datos
        $consultaBuscarDatos->setFetchMode(PDO::FETCH_ASSOC);

        //4. ejecutar la consulta
        $consultaBuscarDatos->execute();

        //5. retornar los datos consultados
        return($consultaBuscarDatos->fetchAll());
    }

    public function eliminarDatos($consultaSQL){
        
        //1. conectarme a la BD
        $conexionBD=$this->conectarBD();

        //2. preparar la consulta
        $consultaEliminarDatos= $conexionBD->prepare($consultaSQL);

        //3. ejecutar la consulta
        $resultado= $consultaEliminarDatos->execute();

        //4. verifique el resultado
        if($resultado){
            echo("Registro eliminado con exito");
        }else{
            echo("Error eliminando el registro");
        }
    }

    public function editarDatos($consultaSQL){


         //1. conectarme a la BD
         $conexionBD=$this->conectarBD();

         //2. preparar la consulta
         $consultaEditarDatos= $conexionBD->prepare($consultaSQL);
 
         //3. ejecutar la consulta
         $resultado= $consultaEditarDatos->execute();
 
         //4. verifique el resultado
         if($resultado){
             echo("Registro editado con exito");
         }else{
             echo("Error editado al registro");
         }
    }

}




?>