<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="estiloListaproductos.css">
    <title>listado</title>
</head>
<body>
   
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Central Instrumental</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="formularioRegistro.php">Registro instrumento</a>
          </li>
        </ul>
      
      </div>
    </nav>
   
   
  </header>
    
  <?php 

   //hacer una consulta en BD para traer todos los usuarios

   //1. incluir el archivo donde esta nuestra clase BaseDatos
   include("BaseDatos.php");

   //2. crear la consulta SQL para buscar datos
   $consultaSQL="SELECT * FROM usuarios WHERE 1";

   //3.  crear un objeto de la clase BaseDatos y usar el metodo buscarDatos

   $transaccion=new BaseDatos();
   $usuarios=$transaccion->buscarDatos($consultaSQL);


   //print_r($usuarios);
  ?>
  <br>
  <br>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3">
      <?php foreach($usuarios as $usuario): ?>

        <div class="col mb-4">
          <div class="card h-100">
            <img src="<?php echo($usuario["foto"]) ?>" class="card-img-top" alt="imagen">
            <div class="card-body">
              <h5 class="card-title"><?php echo($usuario["instrumento"]); ?></h5>
              <p class="card-text"><?php echo($usuario["marca"]); ?></p>
              <p class="card-text"><?php echo($usuario["precio"]); ?></p>
              <p class="card-text"><?php echo($usuario["descripcion"]); ?></p>
              <a href="eliminarProductos.php?id=<?php echo($usuario["idUsuario"]) ?>" class="btn btn-danger">Eliminar</a>
              <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#editar<?php echo($usuario["idUsuario"]) ?>">
                Editar
              </button>
            </div>
          </div>
          <div class="modal fade" id="editar<?php echo($usuario["idUsuario"]) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editando usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="editarInstrumento.php?id=<?php echo($usuario["idUsuario"]) ?>" method="POST">
                    <div class="form-group">
                      <label >instrumento</label>
                      <input type="text" class="form-control" name="instrumentoEditar" value="<?php echo($usuario["instrumento"])?>">
                    </div>

                    <div class="form-group">
                      <label >Marca</label>
                      <input type="text" class="form-control" name="marcaEditar" value="<?php echo($usuario["marca"])?>">
                    </div>
                    <div class="form-group">
                      <label >Precio</label>
                      <input type="text" class="form-control" name="precioEditar" value="<?php echo($usuario["precio"])?>">
                      
                    </div>
                    <div class="form-group">
                      <label >descripcion</label>
                      <textarea class="form-control" name="descripcionEditar"> <?php echo($usuario["descripcion"]) ?></textarea>
                    </div> 
                    
                    <div class="form-group">
                      <label >foto</label>
                      <input type="text" class="form-control" name="fotoEditar" value="<?php echo($usuario["foto"])?>">
                      
                    </div>
                    <button type="submit" class="btn btn-dark" name="botonEditar">Editar</button> 
                    <a href="listaProductos.php" class="btn btn-info">Cancelar</a>             
                  </form>
                </div>
              </div>
            </div>
          </div>
          

        </div>

      <?php endforeach ?>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>