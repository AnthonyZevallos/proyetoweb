<?php
include('login.php');
if(!empty($_POST['idP'])){
  $idP = $_POST['idP'];        
  $mostrar="select nombre_provedor,apellido_provedor,telefono,pais_ciudad,email from proveedor where id_provedor=$idP ";
        
    $result=$conexion->query($mostrar);
    if(!$mostrar) die("fallo en la conexion");
    
    $muestraA= array();
    while($row=mysqli_fetch_array($result)){
        $muestraA[]=array(
        
          'nombre_provedor'=> $row['nombre_provedor'],
          'apellido_provedor'=> $row['apellido_provedor'],
          'telefono'=> $row['telefono'],
          'pais_ciudad'=> $row['pais_ciudad'],
          'email'=> $row['email']
             
        
        );
        
    }
    
    $json=json_encode($muestraA[0]);
     echo $json;
}

?>