<?php
include 'login.php';
  
if(!empty($_POST['user']) && !empty($_POST['pass'])){
     
   
      $pass=md5($_POST['pass']);
      $user=mysqli_real_escape_string($conexion,$_POST['user']);
    
    
      $query = "SELECT * FROM usuario WHERE usuarioB='$user' AND contraseña='$pass'";
         $result =$conexion->query($query);
   
    if($result->num_rows >= 1 ){//viendo si hay similitudes
        

        echo "el usuario ya existe "; 
        
    }else{//ingresamos
          $que="INSERT INTO usuario(usuarioB,contraseña) VALUES ('$user','$pass')";
    
     $sql_query =mysqli_query($conexion,$que); 
    
        if (!$sql_query){ die ("Falló registro");
        }
        else{
          echo "bienvenido ahora puedes loguearte";
            
        }         
      
    }
       

      

        
        
    }



?>