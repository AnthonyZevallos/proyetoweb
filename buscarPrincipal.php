<?php
include('login.php');

$search = $_POST['search'];

if(isset($search)){
    
$busqueda="SELECT ibsn,titulo,categoria,nombre,apellido,nombre_provedor,apellido_provedor,idioma,precio FROM libros as a 
INNER JOIN autor as b ON  a.autor = b.id_autor 
INNER JOIN proveedor as c ON  c.id_provedor =a.di_proveedor where titulo LIKE '%".$search."%' OR categoria LIKE '%".$search."%' ";  
    
  
    
    $RESULT=$conexion->query($busqueda);
    
    if (!$RESULT) die ("Falló el acceso a la base de datos thony"); 
    
    $sql_query =mysqli_query($conexion,$busqueda);
    
    
    $json =array();
    while($row=mysqli_fetch_array($sql_query  )){
         $json[] =array( 
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
//convertiendo  el array para mandar al fronem       
    $jsontring = json_encode($json);
    
    echo $jsontring; 
}




?>