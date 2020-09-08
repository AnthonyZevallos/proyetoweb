<?php 

include('login.php');


if(isset($_POST['idI']) && isset($_POST['eliminardato'])){
 
    $idI=$_POST['idI']; //1 el id 
    $eliminardato=md5($_POST['eliminardato']); 
    
    
    $igualando="SELECT * FROM libros WHERE idLIBRO='$idI' AND ibsn='$eliminardato'";
    
    $r=$conexion->query($igualando);
    
    $sql_query =mysqli_query($conexion,$igualando);
    
    
    if($sql_query->num_rows >=1){
        
        $query ="DELETE FROM libros WHERE idLIBRO ='$idI'";
     $result=$conexion->query($query);
      if(!$result ){die("fallo en la eliminacion");
                
                } 
                echo "eliminacion con exito";
        
    }else{
        
       die("el ibsn no concuerda");    
    }
    
    
    
               
    
    
    
}


else{
    
  echo "NO EXISTE POST ";  
}
 





function get_post($con, $var)
 {
 return $con->real_escape_string($_POST[$var]);
 } 


?>