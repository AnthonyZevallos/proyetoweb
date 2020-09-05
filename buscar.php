<?php 


include('login.php');

$search = $_POST['search'];

if(isset($search)){
    
  $busqueda="select * from libros where titulo LIKE '%".$search."%' ";  
    
    $RESULT=$conexion->query($busqueda);
    
    if (!$RESULT) die ("Falló el acceso a la base de datos thony"); 
    
    $sql_query =mysqli_query($conexion,$busqueda);
    
     
    $json =array();
    while($row=mysqli_fetch_array($sql_query  )){
         $json[] =array( 
            'ibsn' => $row['ibsn'],   
            'titulo' => $row['titulo'],  
            'categoria' => $row ['categoria'],
            'fecha' => $row['fecha'], 
            'autor' => $row['autor'],
            'di_proveedor' => $row['di_proveedor'], 
            'editorial' => $row['editorial'],
            'idioma' => $row['idioma'], 
            'precio' => $row ['precio'],
       
            'descripcion' => $row['descripcion'] 
      );
        
    }
//convertiendo  el array para mandar al fronem       
    $jsontring = json_encode($json);
    
    echo $jsontring; 
}


?>