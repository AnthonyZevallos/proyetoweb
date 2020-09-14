<?php
include "login.php";  
/*almacenando al dueño del libro*/

if(isset($_POST['nombreP']) && isset($_POST['apellidoP']) && isset($_POST['telefonoP']) && isset($_POST['paisP']) && isset($_POST['emailP']) && isset($_POST['dniP'])){
                  
      $nombreP = mysqli_real_escape_string($conexion,$_POST['nombreP']);
      $apellidoP = mysqli_real_escape_string($conexion,$_POST['apellidoP']);
      $telefonoP = mysqli_real_escape_string($conexion,$_POST['telefonoP']);
      $paisP = mysqli_real_escape_string($conexion,$_POST['paisP']);
      $emailP = mysqli_real_escape_string($conexion,$_POST['emailP']);
      $dniP = mysqli_real_escape_string($conexion,$_POST['dniP']);
    
       
     $exitepro ="select * from proveedor where nombre_provedor ='$nombreP' or dni='$dniP'  "; 
       
       $resultado = $conexion->query($exitepro);
       
      if($resultado->num_rows > 0 ){
          echo "ya existe este usuario";
         /*ya esiste este autor baya a seleccionar*/
                          
        if (!$resultado) die ("Falló el acceso a la base de datos thony");  
        }  
      
       else{
               
        $agregarP="insert  into proveedor (nombre_provedor,apellido_provedor,telefono,pais_ciudad,email,dni) values('$nombreP','$apellidoP','$telefonoP','$paisP','$emailP','$dniP')";
          
            $resultadoP = $conexion->query( $agregarP);
           if (!$resultadoP){die ("Falló el acceso a la base de datos thony");
                            }else{ echo "reguistro con exito";} 
       
       
       }
       
   }



?>