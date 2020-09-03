<?php

include('login.php');
 $query="SELECT ibsn,titulo,categoria,nombre,apellido,nombre_provedor,apellido_provedor,idioma,precio FROM libros as a 
INNER JOIN autor as b ON  a.autor = b.id_autor 
INNER JOIN proveedor as c ON  c.id_provedor =a.di_proveedor";
  
 $result= $conexion->query($query);
 if(!$result) die('error en laconsulta');
  
  $mostrando=array();
 while($row =mysqli_fetch_array($result)){
     $mostrando[] =array(
      'ibsn' => $row['ibsn'],
      'titulo' => $row['titulo'],
      'categoria' => $row['categoria'],         
      'nombre' => $row['nombre'],
      'apellido' => $row['apellido'],
      'nombre_provedor' => $row['nombre_provedor'],
      'apellido_provedor' => $row['apellido_provedor'],         
      'idioma' => $row['idioma'],
      'precio' => $row['precio'],         
     );   
     
 }
$jsonmandaString = json_encode($mostrando);
 echo $jsonmandaString;
?>