<?php

include('login.php');
 $query="select ibsn,titulo,categoria,idioma FROM libros";
  
 $result= $conexion->query($query);
 if(!$result) die('error en laconsulta');
  
  $mostrando=array();
 while($row =mysqli_fetch_array($result)){
     $mostrando[] =array(
      'ibsn' => $row['ibsn'],
      'titulo' => $row['titulo'],
      'categoria' => $row['categoria'],         
      'idioma' => $row['idioma'],
     );   
     
 }
$jsonmandaString = json_encode($mostrando);
 echo $jsonmandaString;
?>