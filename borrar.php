<?php 

include('login.php');


if(isset($_POST['idI']) && isset($_POST['eliminardato'])){
 
    $idI=$_POST['idI']; //1
    $eliminardato=$_POST['eliminardato'];  
    
    
    
    $query ="DELETE FROM libros WHERE idLIBRO ="."$idI";
     $result=$conexion->query($query);
      if(!$result){die("fallo en la eliminacion");
                
                } 
                echo "eliminacion con exito";
}else{
    
  echo "NO EXISTE POST ";  
}
 





function get_post($con, $var)
 {
 return $con->real_escape_string($_POST[$var]);
 } 


?>