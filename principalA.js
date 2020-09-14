$(function() {
    
  
    
    
       
   //para buscar libros
       
      $('.btn').click(function(e){
          var bus= $('#search').val();
          
          if(bus ===""){
             alert("no hay nada en el buscador");
              return false;
             }
          
           const search= $('#search').val();
          
        $.ajax({
            url:'buscarPrincipal.php',
            type:'POST',
            
            data: {
                search:search
                
            },
            success: function(loquemanda){
                let muestras = JSON.parse(loquemanda); //TRANSFORMANDO EL STRING JSON A UN OBJETO PARA PODER  MOSTRARLO
           let modelo='';
            muestras.forEach(muestra =>{
                modelo +=`
                      <tr autor="${muestra.autor}" proveedor="${muestra.di_proveedor}">
                        
                        <td>${muestra.titulo}</td>
                        <td>${muestra.descripcion}</td>
                        <td>${muestra.categoria}</td>                        
                        <td>${muestra.autor}</td>
                        <td>
                        <a href="#" class="mostrarAutor" data-toggle="modal" data-target="#modal4">${muestra.nombre}<a>
                        </td>
                        
                        <td>${muestra.di_proveedor}</td>
                         <td>
                        <a href="#" class="mostrarProveedor" data-toggle="modal" data-target="#modal5">${muestra.nombre_provedor}</a> 
                        </td>
                        
                        <td>${muestra.idioma}</td>
                        <td>${muestra.precio}</td>
                      </tr>
                         `
                });
        $('#cuerpomostrar').html(modelo);
                
            }
            
        });   
           
       e.preventDefault();    
       }); 
       
 
       
       
       
             
    
    
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  //mostrando libros  
    
$.ajax({
        
        url:'listaPrincipal.php',
        type:'GET',
        success: function(r){
          let muestras = JSON.parse(r); //TRANSFORMANDO EL STRING JSON A UN OBJETO PARA PODER  MOSTRARLO
           let modelo='';
            muestras.forEach(muestra =>{
                modelo +=`
                      <tr autor="${muestra.autor}" proveedor="${muestra.di_proveedor}">
                        
                        <td>${muestra.titulo}</td>
                        <td>${muestra.descripcion}</td>
                        <td>${muestra.categoria}</td>
                        <td>${muestra.autor}</td>
                        <td>
                        <a href="#" class="mostrarAutor" data-toggle="modal" data-target="#modal4">${muestra.nombre}<a>
                        </td>
                         
                        <td>${muestra.di_proveedor}</td>
                        <td>
                        <a href="#" class="mostrarProveedor" data-toggle="modal" data-target="#modal5">${muestra.nombre_provedor}</a> 
                        </td>
                        
                        <td>${muestra.idioma}</td>
                        <td>${muestra.precio}</td>
                      </tr>
                         `
                });
        $('#cuerpomostrar').html(modelo);
            
        }
        
    
    }); 
    
$(document).on('click','.mostrarAutor',function(){//del documeto que escuche  el elemento click
    
  let elementoA = $(this)[0].parentElement.parentElement;
    let idA=$(elementoA).attr('autor');
    
    $.post('mostrarAutor.php',{idA:idA},function(response){
        console.log(response);
         const autor=JSON.parse(response);
          $('#nombre').html(autor.nombre);
          $('#apellido').html(autor.apellido);
          $('#nacionalidad').html(autor.nacionalidad);
    });
    
   
    
    
});    
    
 
$(document).on('click','.mostrarProveedor',function(){
    let elemantoP =$(this)[0].parentElement.parentElement;//this para valla al mismo boton y  poder escoger el elemento 
     let idP =$(elemantoP).attr('proveedor');
    $.post('mostrarProveedor.php',{idP:idP},function(response){
      
        const proveedor=JSON.parse(response);
        $('#nombrep').html(proveedor.nombre_provedor);
        $('#apellidop').html(proveedor.apellido_provedor);
        $('#telefono').html(proveedor.telefono);
        $('#pais').html(proveedor.pais_ciudad);
        $('#email').html(proveedor.email);
    });
    
      console.log(idP);
}); 
    
    
     
    
}); 