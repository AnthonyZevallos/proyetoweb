<?php
include "login.php";

  /*almacenando autor del libro*/
   if(isset($_POST['nombreA']) && isset($_POST['apellidoA']) && isset($_POST['nacionalidadA'])){
       
      $nombreA = mysqli_real_escape_string($conexion,$_POST['nombreA']);   
      $apellidoA = mysqli_real_escape_string($conexion,$_POST['apellidoA']) ;
      $nacionalidadA = mysqli_real_escape_string($conexion,$_POST['nacionalidadA']);
       
     $exite ="select * from autor where nombre ='$nombreA' or apellido=' $apellidoA' or nacionalidad='$nacionalidadA' "; 
       
       $resultado = $conexion->query($exite);
       
      if($resultado->num_rows > 0 ){
         echo"ya existe el autor"; 
         /*ya esiste este autor baya a seleccionar*/
                          
        if (!$resultado) die ("Falló el acceso a la base de datos thony");  
        }  
      
       else{
               
        $agregarA="insert  into autor (nombre,apellido,nacionalidad) values('$nombreA','$apellidoA','$nacionalidadA')";
          
            $resultadoA = $conexion->query( $agregarA);
           if (!$resultadoA){die ("Falló el acceso a la base de datos thony");
                            } 
                             else{echo"ingreso exitoso";}
       
       }
       
   }






?>