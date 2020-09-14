
 <!DOCTYPE html>

 <html lang="en">

 <head>

     <meta charset="UTF-8">
     
     <link rel="stylesheet" href="enlaces/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <script src="enlaces/jquery-3.5.1.min.js"></script>
    <script src="enlaces/bootstrap-4.5.2-dist/js/bootstrap.min.js" ></script>
     <link rel="stylesheet" href="css/documeto.css"> 

     <title>Document</title>

 </head>

 <body id="signupp" class="row m-0 justify-content-center align-items-center vh-100 ">

     

   
 
 <?php

  /*----------formulario para registrar al  nuevo user------------*/
        echo <<< _END
        
        
        <div id="csingup">
        
        
         
         <div class="conteiner">
           
           
           <h1 class="text-center" style="color:white">Regístrate</h1><br> 
           
            
        <form class="form-inline my-2 my-lg-0" id="ignup" method="post"><pre>
             <input class="form-control mr-sm-2" type="email" name="user" id="user" placeholder="Ingrese Email" autocomplete="off" ><br>
             <input class="form-control mr-sm-2" type="password" name="pass" id="pass" placeholder="Ingrese Password" autocomplete="off" >
                    
                  <button type="submit" value="TO REGISTER" class="btn btn-primary">TO REGISTER</button><br>
                                <a href='index.php'>ATRAS</a>     
        </form>
        
          </div>
        </div>
        
        _END;
    
  

 
?>


<script src="nuevoUsuario.js"></script>
</body>

 </html>
