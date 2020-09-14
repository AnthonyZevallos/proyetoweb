<?php
include 'login.php';
  
if(!empty($_POST['user']) && !empty($_POST['pass'])){
     
   
      $pass=md5($_POST['pass']);
      $user=mysqli_real_escape_string($conexion,$_POST['user']);
       

        $que="INSERT INTO usuario(usuarioB,contraseña) VALUES ('$user','$pass')";
    
       // $result =$conexion->query($query);
    
     $sql_query =mysqli_query($conexion,$que); 
    
        if (!$sql_query){ die ("Falló registro");
        }
        else{
          echo "bienvenido ahora puedes loguearte";
            
        } 

        
        
    }



?>