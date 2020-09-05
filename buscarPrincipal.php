<?php
include('login.php');

$search = $_POST['search'];

if(isset($search)){
    
$busqueda="SELECT idLIBRO,ibsn,titulo,categoria,autor,nombre,apellido,di_proveedor,nombre_provedor,apellido_provedor,idioma,precio,descripcion FROM libros as a 
INNER JOIN autor as b ON  a.autor = b.id_autor 
INNER JOIN proveedor as c ON  c.id_provedor =a.di_proveedor where titulo LIKE '%".$search."%' OR categoria LIKE '%".$search."%' OR nombre LIKE '%".$search."%' ";  
    
   
    
    $RESULT=$conexion->query($busqueda);
    
    if (!$RESULT) die ("Falló el acceso a la base de datos thony"); 
    
    $sql_query =mysqli_query($conexion,$busqueda);
     
    
    $json =array();
    while($row=mysqli_fetch_array($sql_query  )){
         $json[] =array( 
             'idLIBRO' => $row['idLIBRO'],
             'ibsn' => $row['ibsn'],
             'titulo' => $row['titulo'],
             'categoria' => $row['categoria'], 
             'autor' => $row['autor'],
             'nombre' => $row['nombre'],
             'apellido' => $row['apellido'],
             'di_proveedor' => $row['di_proveedor'],
             'nombre_provedor' => $row['nombre_provedor'],
             'apellido_provedor' => $row['apellido_provedor'],         
             'idioma' => $row['idioma'],
             'precio' => $row['precio'], 
             'descripcion' => $row['descripcion'] 
      );
        
    }
//convertiendo  el array para mandar al fronem       
    $jsontring = json_encode($json);
    
    echo $jsontring; 
}




?>