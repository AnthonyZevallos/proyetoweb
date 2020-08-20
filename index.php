<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
     <link rel="stylesheet" href="enlaces/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <script src="enlaces/jquery-3.5.1.min.js"></script>
    <script src="enlaces/bootstrap-4.5.2-dist/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/styleindex.css">
     
    <title>Document</title>
</head>
<body>
    



<?php 
require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    $alerta ='';
   /* ------------pregunto si esta con contenido para consultar si el usuario exite para acceder el paso*/
    if(isset($_POST['user']) && isset($_POST['pass']))
    {
        $user = mysql_fix_string($conexion, $_POST['user']);
        $pass = md5($_POST['pass']);

        $query = "SELECT * FROM usuario WHERE usuarioB='$user' AND contraseña='$pass'";

        $result = $conexion->query($query);
 /* ----------haciendo una pregunta que si hay una fila igual-------*/        
        
        if ($result->num_rows >= 1)
            /*esto es para direccionar cuando cumple esto*/
            header('location: principal.php');
           /* echo "<h1>Bienvenido</h1>"."<br><h3>nos alegra su parcipacion disfrutelo para porder entrar solo haga clik </h3> <a class='btn btn-primary' href='principal.php' role='button'>AQUI</a> ";*/
            
        else
            
          /*  $alerta='usuario o contraseña incorresta';*/
            echo "<br><h1>User or password incorrect</h1> <br>  <a class='btn btn-primary' href='signup.php' role='button'>REGISTRARSE</a> "; 
         echo "<br> <a class='btn btn-primary' href='index.php' role='button'>SALIR</a> ";
        
    }
        
    else
    {
        /*--------formularios de para acceder los datos y haga las respectivas consultasss-----*/
        echo <<<_END
           
        
        <div id='contenedor'>
            <h1>Ingresa</h1>
            
        <form class="form-inline my-2 my-lg-0" action="index.php" method="post"><pre>
        <input class="form-control mr-sm-2" type="email" name="user" placeholder="Usuario" required/><br>
        <input class="form-control mr-sm-2" type="password" name="pass" placeholder="Password" autocomplete="off" required/>
                    
               <button type="submit" value="INGRESAR" class="btn btn-primary">INGRESAR</button><br>
                                <a href='signup.php'>REGISTRARSE</a>
        </form>
        
        </div>
        
        _END;
    }
    
    function mysql_fix_string($coneccion, $string)
    {
        if (get_magic_quotes_gpc())
            $string = stripcslashes($string);
        return $coneccion->real_escape_string($string);
    }
   /* es para saber si esta o no<div class='alert'><?php echo isset($alerta) ? $alerta :''; ?></div> */
?>

 
</body>
</html>