<?php

include('login.php');
 $query="select idLIBRO,ibsn,titulo,categoria,idioma FROM libros";
  
 $result= $conexion->query($query);
 if(!$result) die('error en laconsulta');
  
  $mostrando=array();
 while($row =mysqli_fetch_array($result)){
     $mostrando[] =array(
      'idLIBRO'=> $row['idLIBRO'],           
      'ibsn' => $row['ibsn'],
      'titulo' => $row['titulo'],
      'categoria' => $row['categoria'],         
      'idioma' => $row['idioma']
     );   
     
 }
$jsonmandaString = json_encode($mostrando);
 echo $jsonmandaString;
?>  