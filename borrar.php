<?php 

include('login.php');

$idI=$_POST['idI'];
$eliminardato=$_POST['eliminardato'];
if($idI==$eliminardato){
    $query ="DELETE FROM libros WHERE ibsn ="."{$idI}";
     $result=$conexion->query($query);
      if(!$result){die("fallo en la eliminacion");
                
                } 
                echo "eliminacion con exito";
}else{
    
  echo "el ibsn no es el correcto ";  
}






function get_post($con, $var)
 {
 return $con->real_escape_string($_POST[$var]);
 } 


?>