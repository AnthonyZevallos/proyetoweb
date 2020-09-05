<?php
include('login.php');
if(!empty($_POST['idA'])){
  $idA = $_POST['idA'];        
  $mostrar="select nombre,apellido,nacionalidad from autor where id_autor=$idA ";
        
    $result=$conexion->query($mostrar);
    if(!$mostrar) die("fallo en la conexion");
    
    $muestraA= array();
    while($row=mysqli_fetch_array($result)){
        $muestraA[]=array(
        
          'nombre'=> $row['nombre'],
          'apellido'=> $row['apellido'],
          'nacionalidad'=> $row['nacionalidad']    
        
        );
        
    }
    
    $json=json_encode($muestraA[0]);
     echo $json;
}

?>  