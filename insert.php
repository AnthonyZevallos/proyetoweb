<?php
include('login.php'); 

if(isset($_POST['ibsn'])){
             
   $ibsn =md5($_POST['ibsn']);
   $titulo = mysqli_real_escape_string($conexion,$_POST['titulo']); 
   $categoria = mysqli_real_escape_string($conexion,$_POST['categoria']);
   $fechaPublicacion = mysqli_real_escape_string($conexion,$_POST['fechaPublicacion']);
   $fkautor =$_POST['fkautor'];
   $fkproveedor =$_POST['fkproveedor']; 
   $editorial = mysqli_real_escape_string($conexion,$_POST['editorial']);
   $idioma = mysqli_real_escape_string($conexion,$_POST['idioma']);
   $precio = mysqli_real_escape_string($conexion,$_POST['precio']);         
   $descripcion = mysqli_real_escape_string($conexion,$_POST['descripcion']);  
    
    
   $query ="INSERT INTO libros (idLIBRO,ibsn,titulo,categoria,fecha,autor,di_proveedor,editorial,idioma,precio,descripcion) VALUES "."(null,'$ibsn','$titulo','$categoria','$fechaPublicacion','$fkautor','$fkproveedor','$editorial','$idioma','$precio','$descripcion')";
    
   
 $result = $conexion->query($query);
 if (!$result) {die('fallo en la insercion');
               }

   echo'esta correcto la insercion...';  
}

 
?>