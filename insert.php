<?php
include('login.php');

if(isset($_POST['ibsn'])){
   $ibsn =$_POST['ibsn'];
   $titulo =$_POST['titulo']; 
   $categoria =$_POST['categoria'];
   $fechaPublicacion =$_POST['fechaPublicacion'];
   $fkautor =$_POST['fkautor'];
   $fkproveedor =$_POST['fkproveedor']; 
   $editorial =$_POST['editorial'];
   $idioma =$_POST['idioma'];
   $precio =$_POST['precio'];         
   $descripcion =$_POST['descripcion'];  
    
    
   $query ="INSERT INTO libros (idLIBRO,ibsn,titulo,categoria,fecha,autor,di_proveedor,editorial,idioma,precio,descripcion) VALUES "."(null,'$ibsn','$titulo','$categoria','$fechaPublicacion','$fkautor','$fkproveedor','$editorial','$idioma','$precio','$descripcion')";
    
   
 $result = $conexion->query($query);
 if (!$result) {die('fallo en la insercion');
               }

   echo'esta correcto la insercion...';  
}

 
?>