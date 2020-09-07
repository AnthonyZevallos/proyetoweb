<?php 
 include "login.php"; 

  /*almacenando autor del libro*/
   if(isset($_POST['nombreA']) && isset($_POST['apellidoA']) && isset($_POST['nacionalidadA'])){
       
      $nombreA = $_POST['nombreA'];
      $apellidoA = $_POST['apellidoA'];
      $nacionalidadA = $_POST['nacionalidadA'];
       
     $exite ="select * from autor where nombre ='$nombreA' or apellido=' $apellidoA' or nacionalidad='$nacionalidadA' "; 
       
       $resultado = $conexion->query($exite);
       
      if($resultado->num_rows > 0 ){
          
         /*ya esiste este autor baya a seleccionar*/
                          
        if (!$resultado) die ("Falló el acceso a la base de datos thony");  
        }  
      
       else{
               
        $agregarA="insert  into autor (nombre,apellido,nacionalidad) values('$nombreA','$apellidoA','$nacionalidadA')";
          
            $resultadoA = $conexion->query( $agregarA);
           if (!$resultadoA) die ("Falló el acceso a la base de datos thony");
       
       
       }
       
   }

/*almacenando al dueño del libro*/

if(isset($_POST['nombreP']) && isset($_POST['apellidoP']) && isset($_POST['telefonoP']) && isset($_POST['paisP']) && isset($_POST['emailP']) && isset($_POST['dniP'])){
       
      $nombreP = $_POST['nombreP'];
      $apellidoP = $_POST['apellidoP'];
      $telefonoP = $_POST['telefonoP'];
      $paisP = $_POST['paisP'];
      $emailP = $_POST['emailP'];
      $dniP = $_POST['dniP'];
    
       
     $exitepro ="select * from proveedor where nombre_provedor ='$nombreP' or dni='$dniP'  "; 
       
       $resultado = $conexion->query($exitepro);
       
      if($resultado->num_rows > 0 ){
          
         /*ya esiste este autor baya a seleccionar*/
                          
        if (!$resultado) die ("Falló el acceso a la base de datos thony");  
        }  
      
       else{
               
        $agregarP="insert  into proveedor (nombre_provedor,apellido_provedor,telefono,pais_ciudad,email,dni) values('$nombreP','$apellidoP','$telefonoP','$paisP','$emailP','$dniP')";
          
            $resultadoP = $conexion->query( $agregarP);
           if (!$resultadoP) die ("Falló el acceso a la base de datos thony");
       
       
       }
       
   }
    



    



  /*aca para la  las claves  de la otra tabla me envie autor*/
    $response = "select * from autor";  
    $result = $conexion->query($response);
    if (!$result) die ("Falló el acceso a la base de datos thony");
   // print_r($result);
    $sql_query =mysqli_query($conexion,$response);
  /*aca para la  las claves  de la otra tabla me envie proveedor*/

    $respoprovee ="select * from proveedor";
    $resupro =$conexion->query($respoprovee);
    if(!$resupro) die ("fallo el acceso a la base de datos thony");
    // print_r($resupro); 
    $sql_almacen=mysqli_query($conexion,$respoprovee);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="enlaces/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/documeto.css">
    <title>agregar</title>
    
</head>
<body id="prueva">
    
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
   
    <a class="navbar-brand" href="principal.php">libros</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
       <li class="nav-item active">
         <a class="nav-link" href="#"  tabindex="-1" aria-disabled="true">agregar </a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="#"  tabindex="-1" aria-disabled="true">informacion</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">categorias</a>
       </li>
       <li class="nav-item">
         <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">autores</a>
       </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
      
    
  </div>
</nav>

 
   
 
 <div class="container p-4 " >
      <div class="row">
          <div class="col-md-5">  
           
             <div class="card">
               
                 <div class="card-body">
                     <h2 class="text-center">agrega los datos al formulario</h2>
                    
                     <form id="almacen-form" method="post"  >
                       
                         <div class="form-group">
                          
                           <input type="text" class="form-control" id="ibsn" name="ibsn" placeholder="agregar el ibsn">  
                         </div>
                         <div class="form-group">
                           <input type="text" class="form-control" id="titulo"  name="titulo" placeholder="titulo">     
       
                         </div>
                    <label for="categoria">categoria</label>
                         <select name="categoria" id="categoria" class="form-control">
                                    <option class="form-control" value="matematica">matemáticas</option>
                                    <option class="form-control" value="literatura">literatura</option>
                                    <option class="form-control" value="politica">politica</option>
                                    <option class="form-control" value="cultura">cultura</option>
                                    <option class="form-control" value="tecnologia">ciencia y tecnología</option>
                                    <option class="form-control" value="medicina">ciencia y medicina</option>
                                    
                         </select>
                         <label for="publicacion">fecha de publicación</label>
                         <div class="form-group">
                           <input type="date" class="form-control" id="fechaPublicacion" name="fechaPublicacion"> 
                         </div>
                         
                   <a class='form-group' data-toggle='modal' data-target='#modal1' >elige el autor Clik aqui agregar</a>    
                         <select name="fkautor" id="fkautor" class="form-control">
                      <?php 
                        while($row=mysqli_fetch_array($sql_query ,MYSQLI_NUM)){
                            
                        echo "<option value=".$row[0].">".$row[1]."".$row[2] ."</option>";    
                        }
                            
                            
                            
                       ?>                 
                            
                        </select> 
                    
                 <a class='form-group' data-toggle='modal' data-target='#modal2' >si no figuras Clik aqui agregar</a> 
                     <select name="fkproveedor" id="fkproveedor" class="form-control">
                      <?php 
                        while($row=mysqli_fetch_array($sql_almacen ,MYSQLI_NUM)){
                            
                        echo "<option value=".$row[0].">".$row[1]." ".$row[2]."</option>";    
                        }
                            
                            
                            
                       ?>                 
                            
                        </select>       
                              
                         
                         <br> 
                        <div class="form-group">
                           <input type="text" class="form-control" id="editorial" name="editorial" placeholder="editorial">  
                         </div>
                  <label for="idioma">Que idioma esta escrita?</label>
                    <select name="idioma" id="idioma" class="form-control">
                                    <option class="form-control" value="Español">Español</option>
                                    <option class="form-control" value="Ingles">Inglés</option>
                                    <option class="form-control" value="Chino">Chino</option>
                                    <option class="form-control" value="Arabe">Arabe</option>
                                    <option class="form-control" value="Portugues">Portugués</option>
                                    <option class="form-control" value="Ruso">Ruso</option>
                                    <option class="form-control" value="Quechua">Quechua</option>
                                    
                  </select>   
                         
                      <br>
                     <div class="form-group">
                           
                           <input type="text" class="form-control" id="precio" name="precio" placeholder="precio">  
                     </div>
                     
                     
             <div class="form-group">
                          <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10"></textarea> 
                     
                     </div> 
                     
                     
                                 
                         <button type="submit" class="btn btn-warning btn-block text-center submitBtn" name="btn" id="boton">
                             guardar... 
                         </button>
                     </form>
                     
                 </div>
             </div>
              
          </div>
          <div class="col-md-7 ">
           <div class="card my-4" id="para_ocultar">
               <div class="card-body">
                   <ul id="contenedorA"></ul>
                   
               </div>
               
               
           </div>
          
          
           <table class="table table-bordered table.sm">
               <thead>
                  <tr>
                   <td class="table-success">ibsn</td>
                   <td class="table-success">titulo</td>
                   <td class="table-success">categoria</td>
                   <td class="table-success">idioma</td>
                   <td class="table-success">btn</td>
                </tr>   
                   
               </thead>
               
               <tbody id="cuerpomostrar" style="color:white ">
                   
                   
               </tbody>
               
               
               
           </table>
           
              
          </div>
      </div>
     
     
 </div> 
 
  <main class="conteiner1" >
     
    <div class="modal" id="modal1" tabindex="-1" role="dialog" aria-labelledby="tituloventa1" aria-hidden="true" > 
  <div class="modal-dialog" role="document">      
 <div class="modal-content">
     <div id="alerta"></div>
      <div class="modal-header">
            <h2 id="tituloventa1">ingrese datos del autor</h2>
          <button class="close" data-dismiss="modal" aria-label="cerrar">
            <span aria-hidden="true">&times;</span>  
          </button>
          
          
      </div>
       <div class="modal-body">
           <form action="agregar1.php" method="post"> 
           
        <input class="form-control mr-sm-2" type="text" name="nombreA" placeholder="nombre del autor" autocomplete="off" required/><br>
        <input class="form-control mr-sm-2" type="text" name="apellidoA" placeholder="apellido completo" autocomplete="off" required/><br>
        <input class="form-control mr-sm-2" type="text" name="nacionalidadA" placeholder="nacionalidad" autocomplete="off" required/><br>           
                    
               <button type="submit" value="INGRESAR" class="btn btn-primary form-control">INGRESAR</button>
           
           
           </form> 
           
         
           </div>
      
        </div>
     
       </div> 
      </div>       
      
  </main>
 
   <main class="conteiner2" >
     
    <div class="modal " id="modal2" tabindex="-1" role="dialog" aria-labelledby="tituloventa2" aria-hidden="true" > 
  <div class="modal-dialog" role="document">      
 <div class="modal-content">
      <div class="modal-header">
            <h2 id="tituloventa2">ingrese tus datos porfavor</h2>
          <button class="close" data-dismiss="modal" aria-label="cerrar">
            <span aria-hidden="true">&times;</span>  
          </button>
          
          
      </div>
       <div class="modal-body">
           <form action="agregar1.php" method="post"> 
           
        <input class="form-control mr-sm-2" type="text" name="nombreP" placeholder="ingrese su nombre" autocomplete="off" required/><br>
        <input class="form-control mr-sm-2" type="text" name="apellidoP" placeholder="ingrese su apellido" autocomplete="off" required/><br>
        <input class="form-control mr-sm-2" type="text" name="telefonoP" placeholder="mumero telefonico" autocomplete="off" required/><br>       <input class="form-control mr-sm-2" type="text" name="paisP" placeholder="pais-ciudad " autocomplete="off" required/><br> 
        <input class="form-control mr-sm-2" type="email" name="emailP" placeholder="dsdfsd@gmail.com" autocomplete="off" required/><br>
        <input class="form-control mr-sm-2" type="text" name="dniP" placeholder="dni" autocomplete="off" required/><br>                         
                    
               <button type="submit" value="INGRESAR" class="btn btn-primary form-control">INGRESAR</button>
           
           
           </form> 
           
         
           </div>
      
        </div>
     
       </div> 
      </div>       
      
  </main>
   
   <main class="conteiner3" >
     
    <div class="modal " id="modal3" tabindex="-1" role="dialog" aria-labelledby="tituloventa3" aria-hidden="true" > 
  <div class="modal-dialog" role="document">      
 <div class="modal-content">
      <div class="modal-header">
            <h2 id="tituloventa3">ingrese  el ibsn del libro</h2>
          <button class="close" data-dismiss="modal" aria-label="cerrar">
            <span aria-hidden="true">&times;</span>  
          </button>
          
          
      </div>
       <div class="modal-body">
           <form  method="post" id="eliminar"> 
           
        <input class="form-control mr-sm-2" type="text" name="ibsnE" id="ibsnE" placeholder="ingrese el ibsn" autocomplete="off" required/><br>                       
               
                        
               <button type="submit" id="elim" value="INGRESAR" class="btn btn-danger form-control">ELIMINAR</button>
           
            
           </form> 
           
         
           </div>
      
        </div>
     
       </div> 
      </div>       
      
  </main>


        
 
 <script src="enlaces/jquery-3.5.1.min.js"></script>
  <script src="enlaces/bootstrap-4.5.2-dist/js/bootstrap.min.js" ></script>  
  <script src="script.js"></script>                      
</body>
</html>