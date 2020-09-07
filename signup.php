
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

 <body id="signupp">

     

   
 
 <?php

 require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");
   /*---------insertando a los usuarios nuevos ---------*/
    if(isset($_POST['user']) && isset($_POST['pass']))
    {
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);

        $query = "INSERT INTO usuario VALUES('$user', '$pass')";
        $result = $conexion->query($query);
        if (!$result) die ("Falló registro");

        echo "Successful registration <br> <a class='btn btn-primary' href='index.php' role='button'>ENTRA CON TU USUARIO CREADO</a>";
        
    }
    else
    {   /*----------formulario para registrar al  nuevo user------------*/
        echo <<< _END
        
        
        <div class="conteiner">
        
        <div class="row">
         <div class="col-md-4"></div>
           <div class="col-md-4">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 class="text-center" style="color:white">Regístrate</h1> 
            <br>
            
        <form class="form-inline my-2 my-lg-0" action="signup.php" method="post"><pre>
                   <input class="form-control mr-sm-2" type="email" name="user" placeholder="Ingrese Email" autocomplete="off" required/><br>
                   <input class="form-control mr-sm-2" type="password" name="pass" placeholder="Ingrese Password" autocomplete="off" required/>
                   <input type="hidden" name="reg" value="yes">     
                        <button type="submit" value="TO REGISTER" class="btn btn-primary">TO REGISTER</button><br>
                                         <a href='index.php'>ATRAS</a>     
        </form>
        
          </div>
          
         <div class="col-md-4"></div>  
        
        </div>
        </div>
        _END;
    
    }

 
?>


</body>

 </html>
