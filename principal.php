

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="enlaces/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    
    
    <title>Document</title>
     
</head>
<body>
  
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
   
    <a class="navbar-brand" href="#">libros</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
       <li class="nav-item active">
         <a class="nav-link" href="agregar1.php"  tabindex="-1" aria-disabled="true">agregar </a>
       </li>
       <li class="nav-item active">
         <a class="nav-link" href="#"  tabindex="-1" aria-disabled="true">informacion</a>
       </li>
       <li class="nav-item active">
         <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">categorias</a>
       </li>
       <li class="nav-item">
         <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">autores</a>
       </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
  </div>
</nav> 
     <div class="container p-4">
        <div class="row">
           <div class="col-md-12">
               <div>
                  <table id="tablacontenedor" class="table table-bordered table.sm">
                     <thead>
                  <tr>
                   <td class="table-success">ibsn</td>
                   <td class="table-success">titulo</td>
                   <td class="table-success">categoria</td>
                   <td class="table-success">nombre_autor</td>
                   <td class="table-success">apellido_autor</td>
                   <td class="table-success">nombre_proveedor</td>
                   <td class="table-success">apellido_proveedor</td>
                   <td class="table-success">idioma</td>
                   <td class="table-success">precio</td>
                 </tr>   
                   
                    </thead> 
                     
                    <tbody id="cuerpomostrar">
                        
                        
                    </tbody> 
                     
                      
                  </table> 
                   
               </div>
           </div> 
        </div> 
         
        </div> 
  
  
   
  <script src="enlaces/jquery-3.5.1.min.js"></script>
  <script src="enlaces/bootstrap-4.5.2-dist/js/bootstrap.min.js" ></script>
   <script src="principalA.js"></script>  
</body>
</html>