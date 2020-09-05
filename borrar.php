<?php 

include('login.php');

if(isset($_POST['ibsnE']) ){
    
    
    
    $ibsnE = get_post($conexion,'ibsnE');
    
    $query="DELETE FROM libros WHERE ibsn ="."$ibsnE";
    
    $result= $conexion->query($query);
    
    if(!$result){die("fallo en la eliminacion");
                
                } 
                echo "eliminacion con exito";
}


function get_post($con, $var)
 {
 return $con->real_escape_string($_POST[$var]);
 } 


?>